<script lang="ts">
import {defineComponent} from 'vue'
import {useAuthStore} from "../store/auth.ts";
import {useModuleStore} from "../store/module.ts";

export default defineComponent({
  name: "Header",
  setup() {
    const authStore = useAuthStore()
    const moduleStore = useModuleStore();
    return {
      moduleStore, authStore
    };
  },
  props: {
    isDashboard: {
      type: Boolean,
      default: false
    }
  },
  methods: {
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
      <a class="btn btn-ghost text-xl" :href="moduleStore.getCurrentModule?.url" target="_blank">{{ moduleStore.getCurrentModule?.id }}</a>
    </div>
    <div v-if="isDashboard" role="tablist" class="tabs tabs-bordered navbar-center">
      <a role="tab" class="tab tab-active">Statistics</a>
      <a role="tab" class="tab">Members</a>
      <a role="tab" class="tab">Settings</a>
    </div>
    <div class="gap-2 navbar-end">
      <div class="dropdown dropdown-end mr-8">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar ">
          <div class="w-10 rounded-full">
            <img alt="Tailwind CSS Navbar component" src="../assets/user.jpg"/>
          </div>
        </div>
        <ul
            tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li>
            <RouterLink to="/">Home</RouterLink>
          </li>
          <li>
            <a class="justify-between" href="http://127.0.0.1:8000/admin" target="_blank">
              Manage Modules
            </a>
          </li>
          <li>
            <RouterLink to="/addmodule">Add Module</RouterLink>
          </li>
          <li>
            <RouterLink to="/dashboard">Dashboard</RouterLink>
          </li>
          <li><a>Settings</a></li>
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