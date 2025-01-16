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
    };
  },
  async mounted() {
    this.messages = await fetchChatLogs();
    scrollToBottom(this.$refs.chatContainer as HTMLElement);
  },
  watch: {
    async 'moduleStore.currentModule'() {
      this.messages = await fetchChatLogs();
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
    },
  },
});
</script>

<template>
  <div class="flex-1 flex flex-col justify-between">
    <Header/>
    <div ref="chatContainer" class="h-full overflow-y-auto xl:px-[26%] lg:px-[20%]">
      <Message v-for="msg in messages" :key="msg.id" :message="msg"/>
    </div>
    <Input @sendMessage="sendMessage"/>
  </div>
</template>
