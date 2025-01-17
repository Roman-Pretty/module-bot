<script lang="ts">
import {defineComponent} from 'vue'
import BarChart from "../BarChart.vue";

export default defineComponent({
  name: "WeekCard",
  components: {BarChart},
})
</script>

<template>
  <div class="card bg-base-100 shadow-xl w-full my-2">
    <div class="card-body">
      <div class="card-header">
      <h2 class="card-title
      text-lg">Questions Asked this Week</h2>
    </div>
      <BarChart />
    </div>
  </div>
</template>