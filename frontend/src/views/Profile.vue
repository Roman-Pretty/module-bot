<script lang="ts">
import { defineComponent, ref } from 'vue';
import Header from "../components/Header.vue";
import ProfileSidebar from "../components/sidebar/ProfileSidebar.vue";
import { useAuthStore } from "../store/auth.ts";
import { Info } from "lucide-vue-next";
import { fetchUserSummary } from "../api.ts";

export default defineComponent({
  name: "Profile",
  components: { ProfileSidebar, Header, Info },
  setup() {
    const authStore = useAuthStore();
    const userSummary = ref<{
      user_chats: number;
      modules: number;
      top_percentage: number;
    }>();

    const isLoading = ref(true);

    const fetchData = async () => {
      try {
        userSummary.value = await fetchUserSummary();
      } catch (error) {
        console.error("Failed to fetch user summary", error);
      } finally {
        isLoading.value = false;
      }
    };

    return {
      authStore,
      userSummary,
      isLoading,
      fetchData,
    };
  },
  mounted() {
    this.fetchData();
  },
});
</script>

<template>
  <main class="flex flex-row w-screen h-[100dvh]">
    <ProfileSidebar />
    <div class="w-full flex flex-col justify-between">
      <Header :isDashboard="false" />
      <main class="w-full h-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4">
        <h1 class="text-2xl">My Profile</h1>
        <div class="divider mt-1"></div>

        <div v-if="isLoading" class="flex justify-center items-center ">
          <div class="text-center">
            <span class="loading loading-spinner loading-lg"></span>
            <p class="mt-2">Loading your profile...</p>
          </div>
        </div>

        <div v-else class="flex w-full justify-between items-start">
          <div class="flex gap-8 md:flex-row flex-col md:items-start items-center md:text-start text-center">
            <div
              class="rounded-full w-24 h-24 bg-base-300 flex items-center justify-center font-semibold text-6xl pb-2 uppercase"
            >
              {{ authStore?.user?.username?.charAt(0) || "!" }}
            </div>
            <div class="w-2/3">
              <h1 class="text-2xl">
                Welcome, {{ authStore?.user?.username || "" }}
              </h1>
              <p class="text-neutral-400 dark:text-base-content mt-2">
                You have asked
                <span class="font-semibold">{{ userSummary?.user_chats || "0" }} questions</span>
                in your
                <span class="font-semibold">{{ userSummary?.modules || "0" }} enrolled modules</span>.
                You are in the
                <span class="font-semibold">Top {{ userSummary?.top_percentage || "100" }}%</span>
                of all Q-Module-Bot users!
              </p>
            </div>
          </div>
          <div class="hidden md:flex flex-row w-2/5 justify-end">
            <p
              class="text-md mt-2 text-base-content/50 flex flex-row items-center gap-2 tooltip tooltip-bottom cursor-pointer hover:underline"
              data-tip="For your privacy, conversations and usage statistics are stored anonymously."
            >
              Why is that my name?
              <Info :size="16" />
            </p>
          </div>
        </div>
      </main>
    </div>
  </main>
</template>
