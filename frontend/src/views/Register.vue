<template>
  <div>
    <h2>Register</h2>
    <form @submit.prevent="register" >
      <div>
        <label for="username">username:</label>
        <input v-model="username" id="username" type="text" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input v-model="password" id="password" type="password" required>
      </div>
      <button type="submit">Register</button>
    </form>
    <p v-if="error">{{ error }}</p>
    <p v-if="success">{{ success }}</p>
  </div>
</template>

<script>
import { getCSRFToken } from '../store/auth.ts'

export default {
  data() {
    return {
      username: '',
      password: '',
      error: '',
      success: ''
    }
  },
  methods: {
    async register() {
      try {
        const response = await fetch('http://localhost:8000/api/register', {
          method: 'POST',
           headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': getCSRFToken()
                },
          body: JSON.stringify({
            username: this.username,
            password: this.password
          }),
          credentials: 'include'
        })
        const data = await response.json()
        if (response.ok) {
          this.success = 'Registration successful! Please log in.'
          setTimeout(() => {
            this.$router.push('/login')
          }, 1000)
        } else {
          this.error = data.error || 'Registration failed'
        }
      } catch (err) {
        this.error = 'An error occurred during registration: ' + err
      }
    }
  }
}
</script>
