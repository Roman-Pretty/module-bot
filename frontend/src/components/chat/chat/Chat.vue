<script lang="ts">
import {defineComponent, inject, nextTick} from 'vue';
import Header from "../../Header.vue";
import Input from "./Input.vue";
import {MessageType} from "../../../types.ts";
import {useAuthStore} from "../../../store/auth.ts";
import Message from "./Message.vue";

export default defineComponent({
  name: "Chat",
  components: {Message, Input, Header},
  setup() {
    const currentModuleID = inject<number>('currentModuleID');
    const authStore = useAuthStore()

    return {
      currentModuleID, authStore
    };
  },
  data() {
    return {
      messages: [] as MessageType[],
      isStreaming: false as boolean,
    };
  },
  methods: {
    async fetchChatLogs(): Promise<void> {
      try {
        const response = await fetch(
            `http://127.0.0.1:8000/api/chat-logs/?username=${this.authStore.user?.username}&course_id=${this.currentModuleID}`,
            {method: "GET"}
        );
        if (!response.ok) {
          throw new Error("Failed to fetch chat logs");
        }
        const data = await response.json();
        this.messages = data.map((msg: any, index: number) => ({
          id: index + 1,
          message: msg.message,
          bot_message: msg.bot_message,
        }));
      } catch (error) {
        console.error("Error:", error);
      }
      this.scrollToBottom();
    },
    async sendMessage(message: string): Promise<void> {
      if (!message) return;

      const userMessage = message;

      // Add user message locally to display immediately
      this.messages.push({
        id: this.messages.length + 1,
        message: userMessage,
        bot_message: false,
      });
      this.scrollToBottom();

      // Send message to the backend and get the streaming response
      try {
        const response = await fetch("http://127.0.0.1:8000/api/embedding-response/", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            username: this.authStore.user?.username,
            module_id: this.currentModuleID,
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
        const reader = response.body?.getReader();
        if (!reader) throw new Error("Stream reader is not available");

        const decoder = new TextDecoder();
        let text = "";

        // Add an initial empty bot message that will be updated with the streaming data
        const botMessageIndex = this.messages.push({
          id: this.messages.length + 1,
          message: "",
          bot_message: true,
        }) - 1;

        const processStream = async () => {
          let done = false;
          while (!done) {
            const {value, done: readerDone} = await reader.read();
            done = readerDone;

            if (value) {
              text += decoder.decode(value, {stream: true});

              // Trigger reactivity by reassigning the object
              this.messages[botMessageIndex] = {
                ...this.messages[botMessageIndex],
                message: text,
              };

              console.log("Current message:", this.messages[botMessageIndex].message);

              this.scrollToBottom();
            }

          }
          this.isStreaming = false;
        };
        await processStream();

      } catch (error) {
        console.error("Error fetching bot response:", error);
      }
    },
    scrollToBottom() {
      const chatContainer = this.$refs.chatContainer as HTMLElement | null;

      if (chatContainer) {
        nextTick(() => {
          chatContainer.scrollTo({
            top: chatContainer.scrollHeight,
            behavior: "smooth",
          });
        });
      }
    },
  },
  watch: {
    currentModuleID: {
      immediate: true,
      handler(newVal: string | undefined) {
        if (newVal) {
          this.fetchChatLogs();
        }
      },
    },
  },
});
</script>

<template>
  <div class="flex-grow flex flex-col justify-between">
    <Header/>
    <div ref="chatContainer" class="h-full overflow-y-auto xl:px-[26%] lg:px-[20%]">
      <Message v-for="msg in messages" :key="msg.id" :message="msg"/>
    </div>
    <Input @sendMessage="sendMessage"/>
  </div>
</template>
