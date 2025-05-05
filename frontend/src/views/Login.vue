<template>
  <div class="hero bg-[#0a1732] dark:bg-base-300 h-[100dvh]">
    <div class="hero-content flex-col lg:flex-row-reverse gap-8">
      <div class="text-center lg:text-left hidden lg:flex flex-col max-w-[30vw] text-white">
        <h1 class="text-5xl font-bold">Welcome to<br/>Q-Module-Bot</h1>
        <p class="py-6 text-white/80">
          Q-Module-Bot is an AI chatbot filled with knowledge about your modules. It can answer questions, provide
          resources and help you with your studies.
          <br/><br/>
          You must login to access the site.
        </p>
      </div>
      <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
        <form class="card-body h-full" @submit.prevent="login">
          <div class="divider text-base-content/50 dark:text-base-content">QModuleBot Login</div>
          <label class="input input-bordered flex items-center gap-2">
            <User class="opacity-35"/>
            <input type="text" class="grow" placeholder="Username" id="username" v-model="username" required
                   @input="resetError"/>
          </label>
          <label class="input input-bordered flex items-center gap-2">
            <KeyRound class="opacity-35"/>
            <input type="password" class="grow" placeholder="Password" id="password" v-model="password" required
                   @input="resetError"/>
          </label>

          <p class=" text-sm w-full text-center my-2" :class="[error ? 'text-error' : 'text-base-content/50']">{{ error ? error : "If you don't have credentials yet, please wait." }}</p>
          <div class="card-actions w-full justify-center mb-4 flex ">

            <button
                class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary text-neutral-50 flex-1 hover:dark:bg-base-100"
                type="submit">Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>

/**
 * Login page for Q-Module-Bot, when a user logs in a session is created
 * and the user is redirected to the home page.
 */

import {useAuthStore} from '../store/auth.ts'
import {KeyRound, User} from "lucide-vue-next";

export default {
  components: {User, KeyRound},
  setup() {
    const authStore = useAuthStore()
    return {
      authStore
    }
  },
  data() {
    return {
      username: "",
      password: "",
      error: ""
    }
  },
  methods: {
    async login() {
      await this.authStore.login(this.username, this.password, this.$router)
      if (!this.authStore.isAuthenticated) {
        this.error = 'Login failed. Please check your credentials.'
      }
    },
    resetError() {
      this.error = ""
    }
  }
}
</script>
