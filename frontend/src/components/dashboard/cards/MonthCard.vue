<script lang="ts">
import {defineComponent, inject} from 'vue'
import BarChart from "../BarChart.vue";

export default defineComponent({
  name: "MonthCard",
  components: {BarChart},
  setup() {
    const currentModuleID = inject<string>('currentModuleID');
    return {
      currentModuleID,
    };
  },
})
</script>

<template>
  <div class="card bg-base-100 shadow-xl w-full my-2">
    <div class="card-body">
      <div class="card-header">
      <h2 class="card-title
      text-lg">Questions Asked this Month</h2>
    </div>
      <BarChart :module-id="this.currentModuleID" :timeframe="'month'"/>
    </div>
  </div>
</template>