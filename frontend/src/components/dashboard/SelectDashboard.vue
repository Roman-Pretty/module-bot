<script>
import {defineComponent} from 'vue'
import Header from "../Header.vue";

export default defineComponent({
  name: "SelectDashboard",
  components: {Header}
})
</script>

<template>
  <div class="flex-grow flex flex-col justify-between">
    <Header/>
    <div class="justify-center items-center flex-grow flex flex-col h-full pb-16">
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-2xl font-semibold">Q-Module-Bot Dashboard</h1>
          <p class="py-4">
            Please select a module to view the dashboard.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>