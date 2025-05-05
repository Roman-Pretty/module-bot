<script>

/**
 * The dashboard, which is only accessible to module organizers.
 *
 * If a module is selected then information appears, but if not a message
 * shows telling the user to choose one.
 */

import {defineComponent, provide, ref} from 'vue'
import Header from "../components/Header.vue";
import {useAuthStore} from "../store/auth.ts";
import {useRouter} from "vue-router";
import Sidebar from "../components/sidebar/Sidebar.vue";
import SelectDashboard from "../components/dashboard/SelectDashboard.vue";
import DashboardContent from "../components/dashboard/DashboardContent.vue";
import {useModuleStore} from "../store/module";

export default defineComponent({
  name: "Dashboard",
  components: {DashboardContent, SelectDashboard, Sidebar, Header},
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
    if(!this.authStore.user?.is_module_organizer) {
      this.$router.back();
      return;
    }
    await this.authStore.fetchUser();
    await this.moduleStore.fetchOrganizedModules();
  },
})
</script>

<template>
  <main class="flex flex-row w-screen h-[100dvh]">
    <Sidebar :is-dashboard="true" :bots="moduleStore.getOrganizedModules || []" />
    <DashboardContent v-if="moduleStore.moduleSelected" />
    <SelectDashboard v-else />
  </main>
</template>

<style scoped>

</style>