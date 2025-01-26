<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
  name: "PageNotFound"
})
</script>

<template>
  <div class="hero min-h-screen">
  <div class="hero-content text-center">
    <div class="max-w-md">
      <h1 class="text-8xl font-bold">404</h1>
      <h2 class="text-2xl">You're not supposed to be here!</h2>
      <p class="py-6 opacity-60">
        The page you were looking for doesn't exist.
      </p>
      <RouterLink to="/" class="btn btn-ghost">Back to home</RouterLink>
    </div>
  </div>
</div>

</template>