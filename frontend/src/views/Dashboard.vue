<script>
import {defineComponent, provide, ref} from 'vue'
import Header from "../components/Header.vue";
import {useAuthStore} from "../store/auth";
import {useRouter} from "vue-router";
import Sidebar from "../components/chat/sidebar/Sidebar.vue";
import SelectDashboard from "../components/dashboard/SelectDashboard.vue";
import DashboardContent from "../components/dashboard/DashboardContent.vue";

export default defineComponent({
  name: "Dashboard",
  components: {DashboardContent, SelectDashboard, Sidebar, Header},
  setup() {
    const currentModuleID = ref("");
    provide('currentModuleID', currentModuleID);
    const authStore = useAuthStore();
    const router = useRouter();

    return {
      authStore, router, currentModuleID
    };
  },
  watch: {
    currentModuleID: {
      immediate: true,
      handler() {
        if (this.currentModuleID) {
          window.document.title = `Dashboard | ${this.currentModuleID}`;
        }
      }
    }
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
  }
})
</script>

<template>
  <main class="flex flex-row w-screen h-screen bg-base-200">
    <Sidebar :bots="bots" />
    <DashboardContent v-if="currentModuleID" />
    <SelectDashboard v-else />
  </main>
</template>

<style scoped>

</style>