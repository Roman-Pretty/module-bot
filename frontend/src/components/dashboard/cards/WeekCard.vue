<script lang="ts">
import {defineComponent, inject} from 'vue'
import BarChart from "../BarChart.vue";

export default defineComponent({
  name: "WeekCard",
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
      text-lg">Questions Asked this Week</h2>
    </div>
      <BarChart :module-id="this.currentModuleID"/>
    </div>
  </div>
</template>