<script lang="ts">
import {defineComponent} from 'vue';
import {useAuthStore} from '../store/auth.ts';
import {useRouter} from 'vue-router';
import Sidebar from "../components/sidebar/Sidebar.vue";
import Chat from "../components/chat/Chat.vue";
import SelectModule from "../components/chat/SelectModule.vue";
import {useModuleStore} from "../store/module.ts";

export default defineComponent({
  name: "ChatBot",
  components: {SelectModule, Chat, Sidebar},
  setup() {
    const moduleStore = useModuleStore();
    const authStore = useAuthStore();
    const router = useRouter();

    return {
      authStore, moduleStore, router
    };
  },
  async mounted() {
    if (!this.authStore.isAuthenticated) {
      this.$router.push({name: 'Login'});
      return;
    }
    await this.authStore.fetchUser();
    await this.moduleStore.fetchModules();
  },
});
</script>

<template>
  <main class="flex flex-row w-screen h-[100dvh]">
    <Sidebar :bots="moduleStore.getModules || []" />
    <Chat v-if="moduleStore.moduleSelected" />
    <SelectModule v-else />
  </main>
</template>
