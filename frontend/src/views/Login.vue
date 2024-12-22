<!--<t>-->
<!--  <div class="login">-->
<!--    <h1>Login</h1>-->
<!--    <form @submit.prevent="login">-->
<!--      <div>-->
<!--        <label for="username">username:</label>-->
<!--        <input v-model="username" id="username" type="text" required-->
<!--               @input="resetError">-->
<!--      </div>-->
<!--      <div>-->
<!--        <label for="password">Password:</label>-->
<!--        <input v-model="password" id="password" type="password" required-->
<!--               @input="resetError">-->
<!--      </div>-->
<!--      <button type="submit">Login</button>-->
<!--    </form>-->
<!--    <p v-if="error" class="error">{{ error }}</p>-->
<!--  </div>-->
<!--</t>-->

<template>
  <div class="hero bg-[#0a1732] min-h-screen login">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="card bg-base-100 w-full shrink-0 shadow-2xl max-w-md rounded-none">
        <form class="card-body gap-4" @submit.prevent="login">
          <h2 class="card-title text-center text-lg">You must be logged in to use QModuleBot.</h2>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Username</span>
            </label>
            <input type="text" placeholder="username" id="username" v-model="username" class="input input-bordered" required @input="resetError"/>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" placeholder="password" id="password" v-model="password" class="input input-bordered" required @input="resetError"/>
            <label class="label">
              <RouterLink to="/register" class="label-text-alt link link-hover">Forgot password?</RouterLink>
            </label>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
          <p v-if="error" class="error">{{ error }}</p>
        </form>

      </div>
    </div>
  </div>
</template>

<script>
import {useAuthStore} from '../store/auth.ts'

export default {
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
