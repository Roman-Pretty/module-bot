<script lang="ts">
import {defineComponent} from 'vue'
import Header from "../Header.vue";
import BarChart from "./statistics/BarChart.vue";
import WeekCard from "./statistics/cards/WeekCard.vue";
import MonthCard from "./statistics/cards/MonthCard.vue";
import CardWrapper from "./statistics/cards/CardWrapper.vue";
import ThreeMonthCard from "./statistics/cards/ThreeMonthCard.vue";
import {useModuleStore} from "../../store/module.ts";
import {useAuthStore} from "../../store/auth.ts";
import ModuleSettings from "./settings/ModuleSettings.vue";
import ModuleStatistics from "./statistics/ModuleStatistics.vue";

export default defineComponent({
  name: "DashboardContent",
  components: {ModuleStatistics, ModuleSettings, ThreeMonthCard, CardWrapper, MonthCard, WeekCard, BarChart, Header},
  data() {
    return {
      selected: 'Statistics'
    }
  },
  setup() {
    const moduleStore = useModuleStore();
    const authStore = useAuthStore();
    if (moduleStore?.getCurrentModule?.organizers &&
        typeof authStore?.user?.id === 'number' &&
        !moduleStore.getCurrentModule.organizers.includes(authStore.user.id)) {
      moduleStore.setCurrentModule('');
    }
  },
  methods: {
    changeSection(section: string) {
      this.selected = section;
    },
  },
})
</script>

<template>
<!--  :class="{ 'bg-base-100': selected === 'Settings' }-->
  <div class="w-full flex flex-col justify-between bg-base-100">
    <Header :is-dashboard="true" @change-section="changeSection"/>
<!--    <div class="h-full overflow-y-auto px-8 mt-8" v-if="selected === 'Statistics'">-->
<!--      <CardWrapper/>-->
<!--    </div>-->
    <ModuleStatistics v-if="selected === 'Statistics'"/>
    <ModuleSettings v-else-if="selected === 'Settings'"/>
  </div>
</template>