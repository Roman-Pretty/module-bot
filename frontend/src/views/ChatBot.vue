<script lang="ts">
import {defineComponent, ref, provide} from 'vue';
import {useAuthStore} from '../store/auth.ts';
import {useRouter} from 'vue-router';
import Sidebar from "../components/chat/sidebar/Sidebar.vue";
import Chat from "../components/chat/chat/Chat.vue";
import SelectModule from "../components/chat/chat/SelectModule.vue";

export default defineComponent({
  name: "ChatBot",
  components: {SelectModule, Chat, Sidebar},
  setup() {
    const currentModuleID = ref("");
    provide('currentModuleID', currentModuleID);
    const authStore = useAuthStore();
    const router = useRouter();

    return {
      authStore, router, currentModuleID
    };
  },
  async mounted() {
    if (!this.authStore.isAuthenticated) {
      this.$router.push({name: 'Login'});
      return;
    }
    await this.authStore.fetchUser();
    this.getBots();
  },
  methods: {
    async getBots() {
      this.bots = await fetch('http://127.0.0.1:8000/api/get_bots/').then((res) => res.json());
    },
  },
  data() {
    return {
      bots: []
    };
  },
});
</script>

<template>
  <main class="flex flex-row w-screen h-screen">
    <Sidebar :bots="bots" />
    <Chat v-if="currentModuleID" />
    <SelectModule v-else />
  </main>
</template>
