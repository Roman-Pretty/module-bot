<script lang="ts">
import {defineComponent} from 'vue'
import Header from "../Header.vue";

export default defineComponent({
  name: "SelectModule",
  components: {Header}
})
</script>

<template>
  <div class="w-full flex flex-col justify-between">
    <Header/>
    <div class="justify-center items-center flex-grow flex flex-col h-full pb-16">
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-2xl ">What can I help you with?</h1>
          <p class="py-4 text-base-content/50">
            Please select a module to start chatting.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>