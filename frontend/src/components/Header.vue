<script lang="ts">
import {defineComponent} from 'vue'
import {useAuthStore} from "../store/auth.ts";
import {useModuleStore} from "../store/module.ts";
import {Plus, ChevronLeft} from 'lucide-vue-next'

export default defineComponent({
  name: "Header",
  components: {
    Plus, ChevronLeft
  },
  setup() {
    const authStore = useAuthStore()
    const moduleStore = useModuleStore();
    return {
      moduleStore, authStore
    };
  },
  data() {
    return {
      selected: 'Statistics'
    }
  },
  props: {
    isDashboard: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    changeSection(section: string) {
      this.selected = section;
      this.$emit('change-section', section);
    },
    async logout() {
      try {
        await this.authStore.logout(this.$router)
      } catch (error) {
        console.error(error)
      }
    },
  },
})
</script>

<template>
  <nav class="navbar ">
    <div class="navbar-start">
      <div v-if="moduleStore?.getCurrentModule == null && $route.path === '/'"/>
      <a v-else-if="$route.path === '/'" class="btn btn-ghost text-xl" :href="moduleStore.getCurrentModule?.url"
         target="_blank">{{ moduleStore.getCurrentModule?.id }}</a>
      <RouterLink to="/" v-else class="btn btn-ghost text-xl text-neutral-400 dark:text-base-content"><ChevronLeft />Back</RouterLink>
    </div>
    <div v-if="isDashboard" role="tablist" class="tabs tabs-bordered navbar-center">
      <a role="tab" :class="{ 'tab-active': selected === 'Statistics' }" class="tab"
         @click="changeSection('Statistics')">Statistics</a>
      <a role="tab" :class="{ 'tab-active': selected === 'Members' }" class="tab" @click="changeSection('Members')">Members</a>
      <a role="tab" :class="{ 'tab-active': selected === 'Settings' }" class="tab" @click="changeSection('Settings')">Settings</a>
    </div>
    <div class="gap-2 navbar-end">
      <RouterLink to="/addmodule"
                  class="tooltip tooltip-bottom btn btn-circle btn-sm text-neutral-700 rounded-full bg-base-100 flex"
                  data-tip="Add Module" v-if="$route.path === '/dashboard'">
        <Plus/>
      </RouterLink>
      <div class="dropdown dropdown-end mr-8">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle ">
          <div class="rounded-full w-10 h-10 bg-base-300 flex items-center justify-center font-semibold text-lg uppercase">
            {{ authStore?.user?.username?.charAt(0) || '!' }}
          </div>
        </div>
        <ul
            tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li>
            <RouterLink to="/">Home</RouterLink>
          </li>
          <li v-if="authStore.isModuleOrganizer">
            <RouterLink to="/dashboard">Dashboard</RouterLink>
          </li>
          <li>
            <RouterLink to="/profile">Profile</RouterLink>
          </li>
          <li>
            <a class="justify-between" @click="logout">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>