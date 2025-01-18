<script lang="ts">
import {defineComponent} from 'vue';
import Header from "../../Header.vue";
import Input from "./Input.vue";
import {useAuthStore} from "../../../store/auth.ts";
import Message from "./Message.vue";
import {askChatbot} from "../../../api.ts";
import {useModuleStore} from "../../../store/module.ts";
import {fetchChatLogs} from "../../../api.ts";
import {scrollToBottom} from "../../../util.ts";

export interface MessageType {
  id: number;
  message: string;
  bot_message: boolean;
  loading?: boolean;
}

export default defineComponent({
  name: "Chat",
  components: {Message, Input, Header},
  setup() {
    const authStore = useAuthStore()
    const moduleStore = useModuleStore();

    return {
      moduleStore, authStore
    };
  },
  data() {
    return {
      messages: [] as MessageType[],
      isLoading: true,
    };
  },
  async mounted() {
    this.messages = await fetchChatLogs();
    this.isLoading = false;
    if (this.messages.length === 0 && this.moduleStore.currentModule?.enable_welcome_message) {
      this.messages.push({
        id: 1,
        message: this.moduleStore.currentModule.welcome_message,
        bot_message: true,
      });
    }
    scrollToBottom(this.$refs.chatContainer as HTMLElement);
  },
  watch: {
    async 'moduleStore.currentModule'() {
      this.isLoading = true;
      this.messages = await fetchChatLogs();
      this.isLoading = false;
      scrollToBottom(this.$refs.chatContainer as HTMLElement);

      if (this.messages.length === 0 && this.moduleStore.currentModule?.enable_welcome_message) {
        this.messages.push({
          id: 1,
          message: this.moduleStore.currentModule.welcome_message,
          bot_message: true,
        });
      }
      scrollToBottom(this.$refs.chatContainer as HTMLElement);
    },
    'isLoading'() {
      scrollToBottom(this.$refs.chatContainer as HTMLElement);
    },
  },
  methods: {
    async sendMessage(message: string): Promise<void> {
      if (!message) return;

      // Add user message locally to display immediately
      this.messages.push({
        id: this.messages.length + 1,
        message: message,
        bot_message: false,
      });

      scrollToBottom(this.$refs.chatContainer as HTMLElement);

      let response = askChatbot(message);
      this.messages.push({
        id: this.messages.length + 1,
        message: '',
        bot_message: true,
        loading: true,
      });

      await (async () => {
        for await (const chunk of response) {
          scrollToBottom(this.$refs.chatContainer as HTMLElement);
          this.messages[this.messages.length - 1].message += chunk;
          this.messages[this.messages.length - 1].loading = false;
        }
      })();
      scrollToBottom(this.$refs.chatContainer as HTMLElement);

    },
  },
});
</script>

<template>
  <div class="w-full flex flex-col justify-between">
    <Header/>
    <div v-if="isLoading" class="flex justify-center items-center h-full">
      <div class="text-center pt-[30vh]">
        <span class="loading loading-spinner loading-lg"></span>
        <p class="mt-2">Loading conversation...</p>
      </div>
    </div>
    <div class="h-full overflow-y-auto overflow-x-hidden xl:px-[26%] lg:px-[20%] px-4"
         v-else-if="messages.length <= 0">
      <div class="flex flex-col items-center justify-center h-full pt-[30vh]">
        <h1 class="text-2xl">No messages yet...</h1>
        <p class="text-neutral-400">Start a conversation by typing in the input field below</p>
      </div>
    </div>
    <div ref="chatContainer" class="h-full overflow-y-auto overflow-x-hidden xl:px-[26%] lg:px-[20%] px-4">
      <Message v-if="!isLoading" v-for="msg in messages" :key="msg.id" :message="msg"/>
    </div>
    <Input @sendMessage="sendMessage"/>
  </div>
</template>
