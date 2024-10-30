<template>
  <div class="flex flex-row h-screen w-screen">
    <div class="w-80 bg-base-200/50 overflow-hidden">
      <SideView @moduleChanged="handleModuleChange"/>
    </div>

    <div class="flex flex-col h-full w-full">
      <div class="flex justify-center my-4">
        <button @click="clearChat" class="text-xs hover:underline">
          Clear Chat
        </button>
      </div>

      <div class="flex-1 overflow-y-auto p-4 px-[20vw]" ref="chatContainer">
        <Message
          v-for="m in messages"
          :key="m.id"
          :message="m.message"
          :bot="m.bot"
        />
        <div v-if="messages.length === 0" class="flex justify-center items-center h-full">
          <h1 class="text-3xl">What can I help you with?</h1>
        </div>
      </div>

      <div class="flex justify-center pb-10 px-[20vw]">
        <InputBar @send="sendMessage" />
      </div>
    </div>
  </div>
</template>

<script>
import SideView from "./components/SideView.vue";
import Message from "./components/Message.vue";
import InputBar from "./components/InputBar.vue";

export default {
  components: { SideView, Message, InputBar },
  data() {
    return {
      currentModule: "ECS417U",
      messages: [],
    };
  },
  mounted() {
    this.fetchChatLogs(this.currentModule);
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
    handleModuleChange(courseId) {
      this.currentModule = courseId;
      this.fetchChatLogs(courseId);
    },
    async sendMessage(message) {
      // This will receive the message emitted from InputBar
      if (!message) return;

      const userMessage = message;

      // Add the user message locally to display it immediately
      this.messages.push({
        message: userMessage,
        bot: false,
      });

      // Send message to the backend and get bot response
      try {
        const response = await fetch("http://127.0.0.1:8000/api/embedding_response/", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            username: "roman",
            module_id: this.currentModule,
            message: userMessage,
          }),
        });

        const data = await response.json();
        if (response.ok) {
          this.messages.push({
            message: data.response,
            bot: true,
          });
        } else {
          console.error("Bot response error:", data.error || "Unknown error");
        }
      } catch (error) {
        console.error("Error fetching bot response:", error);
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
  },
};
</script>
