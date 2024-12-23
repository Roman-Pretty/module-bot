<script lang="ts">
import {defineComponent, inject} from 'vue'
import BarChart from "../BarChart.vue";

export default defineComponent({
  name: "ThreeMonthCard",
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
      text-lg">Questions Asked this Semester</h2>
    </div>
      <BarChart :module-id="this.currentModuleID" :timeframe="'3months'"/>
    </div>
  </div>
</template>