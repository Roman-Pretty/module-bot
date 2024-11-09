<template>
  <div class="flex flex-row h-screen w-screen">
    <div class="w-80 bg-qm overflow-hidden">
      <SideView @selectBot="selectBot" :bots="bots" :currentModule="currentModule"/>
    </div>

    <div class="flex flex-col h-full w-full">
      <div class="navbar bg-base-100">
        <div class="flex-1">
          <a class="btn btn-ghost text-xl" @click="redirectToModuleUrl">{{ currentModule }}</a>
        </div>
        <div class="flex-none gap-2">
          <div class="dropdown dropdown-end mr-8">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar ">
              <div class="w-10 rounded-full">
                <img alt="Tailwind CSS Navbar component" src="../assets/user.jpg"/>
              </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li>
                <a class="justify-between" href="http://127.0.0.1:8000/admin" target="_blank">
                  Manage Modules
                </a>
              </li>
              <li>
                <RouterLink to="/addmodule">Add Module</RouterLink>
              </li>
              <li><a @click="clearChat">Clear Chat</a></li>
              <li><a>Settings</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div v-if="currentModule === ''" class="flex flex-col justify-center items-center h-full w-full">
        <h1 class="text-3xl pb-2">Select a module to start chatting</h1>
        <BotsList :bots="bots" @setCurrentModule="selectBot"/>
      </div>

      <div v-if="currentModule !== ''" class="flex-1 overflow-y-auto p-4 lg:px-[22vw] px-[18vw]" ref="chatContainer">
        <Message
            v-for="m in messages"
            :key="m.id"
            :message="m.message"
            :bot_message="m.bot_message"
        />
        <div v-if="messages.length === 0 && currentModule !== ''" class="flex justify-center items-center h-full">
          <h1 class="text-3xl">What can I help you with?</h1>
        </div>
      </div>

      <div v-if="currentModule !== ''" class="flex justify-center pb-10 lg:px-[22vw] px-[18vw]">
        <InputBar @send="sendMessage"/>
      </div>
    </div>
  </div>
</template>

<script>
import SideView from "../components/chat/SideView.vue";
import Message from "../components/chat/Message.vue";
import InputBar from "../components/chat/InputBar.vue";
import BotsList from "../components/chat/BotsList.vue";

export default {
  name: "ChatBot",
  components: {BotsList, SideView, Message, InputBar},
  data() {
    return {
      currentModule: "",
      messages: [],
      isStreaming: false,
      bots: []
    };
  },
  mounted() {
    this.fetchBots();
  },
  updated() {
    this.scrollToBottom();
  },
  methods: {
    async fetchChatLogs(moduleId) {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/chatlogs/?username=roman&course_id=${moduleId}`);
        if (!response.ok) {
          throw new Error("Failed to fetch chat logs");
        }
        const data = await response.json();
        this.messages = data;
        this.scrollToBottom();
      } catch (error) {
        console.error("Error:", error);
      }
    },
    async fetchModuleUrl(courseId) {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/module-url/?course_id=${courseId}`);
        if (!response.ok) {
          throw new Error("Failed to fetch module URL");
        }
        const data = await response.json();
        return data.url;
      } catch (error) {
        console.error("Error fetching module URL:", error);
        return null;
      }
    },
    async redirectToModuleUrl() {
      const moduleUrl = await this.fetchModuleUrl(this.currentModule);
      if (moduleUrl) {
        window.open(moduleUrl, '_blank');
      }
    },
    handleModuleChange(courseId) {
      this.currentModule = courseId;
      this.fetchChatLogs(courseId);
    },
    async sendMessage(message) {
      if (!message) return;

      const userMessage = message;

      // Add user message locally to display immediately
      this.messages.push({
        message: userMessage,
        bot_message: false,
      });

      // Send message to the backend and get the streaming response
      try {
        const response = await fetch("http://127.0.0.1:8000/api/embedding_response/", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            username: "roman", // TODO: Hardcoded username for now
            module_id: this.currentModule,
            message: userMessage,
          }),
        });

        if (!response.ok) {
          const errorData = await response.json();
          console.error("Bot response error:", errorData.error || "Unknown error");
          return;
        }

        // Start streaming the response tokens
        this.isStreaming = true;
        const reader = response.body.getReader();
        const decoder = new TextDecoder();
        let text = "";

        // Method to process the streaming response
        const processStream = async () => {
          const {done, value} = await reader.read();
          if (done) {
            this.isStreaming = false;
            // Push the complete response once the stream finishes
            this.messages[this.messages.length - 1].message = text;
            this.scrollToBottom();
            return;
          }

          text += decoder.decode(value, {stream: true});
          this.messages[this.messages.length - 1].message = text;
          this.scrollToBottom();

          processStream();
        };

        // Add an initial empty bot message that will be updated with the streaming data
        this.messages.push({
          message: "",
          bot_message: true,
        });

        processStream();

      } catch (error) {
        console.error("Error fetching bot response:", error);
      }
    },
    async fetchBots() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/get_bots/');
        if (response.ok) {
          this.bots = await response.json();
        } else {
          console.error('Failed to fetch bots');
        }
      } catch (error) {
        console.error('Error fetching bots:', error);
      }
    },
    selectBot(courseId) {
      this.currentModule = courseId;
      this.updateModuleOnServer(courseId);
      this.handleModuleChange(courseId);
    },
    async updateModuleOnServer(courseId) {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/set_current_module/', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({course_id: courseId}),
        });

        if (!response.ok) {
          console.error('Failed to update current module on server');
        }
      } catch (error) {
        console.error('Error updating module on server:', error);
      }
    },
  async clearChat() {
    try {
      const response = await fetch("http://127.0.0.1:8000/api/clear-chatlogs/", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          username: "roman",
          module_id: this.currentModule,
        }),
      });

      if (response.ok) {
        this.messages = [];
      } else {
        const errorData = await response.json();
        console.error("Error clearing chat:", errorData.message);
      }
    } catch (error) {
      console.error("Error clearing chat:", error);
    }
  },
  scrollToBottom() {
    const chatContainer = this.$refs.chatContainer;
    if (chatContainer) {
      chatContainer.scrollTo({
        top: chatContainer.scrollHeight,
        behavior: "smooth",
      });
    }
  },
}
,
}
;
</script>
