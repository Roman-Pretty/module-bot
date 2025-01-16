<script lang="ts">
import {defineComponent} from 'vue'
import Header from "../Header.vue";
import BarChart from "./BarChart.vue";
import WeekCard from "./cards/WeekCard.vue";
import MonthCard from "./cards/MonthCard.vue";
import CardWrapper from "./cards/CardWrapper.vue";
import ThreeMonthCard from "./cards/ThreeMonthCard.vue";

export default defineComponent({
  name: "DashboardContent",
  components: {ThreeMonthCard, CardWrapper, MonthCard, WeekCard, BarChart, Header},
})
</script>

<template>
  <div class="flex-grow flex flex-col justify-between">
    <Header :is-dashboard="true"/>
    <div class="h-full overflow-y-auto px-8">
      <CardWrapper/>
      <ThreeMonthCard/>
    </div>
  </div>
</template>