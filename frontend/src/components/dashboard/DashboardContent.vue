<script lang="ts">
import {defineComponent} from 'vue'
import Header from "../Header.vue";
import BarChart from "./statistics/BarChart.vue";
import ModuleSettings from "./settings/ModuleSettings.vue";
import ModuleStatistics from "./statistics/ModuleStatistics.vue";
import ModuleMembers from "./members/ModuleMembers.vue";
import Footer from "./Footer.vue";

export default defineComponent({
  name: "DashboardContent",
  components: {
    Footer,
    ModuleMembers, ModuleStatistics, ModuleSettings, BarChart, Header
  },
  data() {
    return {
      selected: 'Statistics'
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
    <ModuleStatistics v-if="selected === 'Statistics'"/>
    <ModuleSettings v-else-if="selected === 'Settings'"/>
    <ModuleMembers v-else-if="selected === 'Members'"/>
    <Footer @change-section="changeSection"/>
  </div>
</template>