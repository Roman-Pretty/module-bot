<script>
/**
 * A simple component telling the user to select a module.
 */

import {defineComponent} from 'vue'
import Header from "../Header.vue";

export default defineComponent({
  name: "SelectDashboard",
  components: {Header}
})
</script>

<template>
  <div class="w-full flex flex-col justify-between">
    <Header />
    <div class="justify-center items-center flex-grow flex flex-col h-full pb-16">
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-2xl">Q-Module-Bot Dashboard</h1>
          <p class="py-4 text-base-content/50">
            Please select a module to view the dashboard.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>