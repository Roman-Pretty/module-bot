<script lang="ts">

/**
 * A footer that displays if accessing the dashboard
 * on a mobile view, looks similar to the tabs of instagram or other
 * apps.
 */
import {defineComponent} from 'vue'
import {ChartColumnIncreasing, Users, Settings2} from "lucide-vue-next";

export default defineComponent({
  name: "Footer",
  components: {
    ChartColumnIncreasing, Users, Settings2
  },
  data() {
    return {
      selected: 'Statistics'
    }
  },
  methods: {
    changeSection(section: string) {
      this.selected = section;
      this.$emit('change-section', section);
    },
  },

})
</script>

<template>
  <div class="btm-nav md:hidden flex">
    <button @click="changeSection('Statistics')" :class="{ 'active': selected === 'Statistics' }">
      <ChartColumnIncreasing />
      <span class="btm-nav-label">Statistics</span>
    </button>
    <button @click="changeSection('Members')" :class="{ 'active': selected === 'Members' }">
      <Users />
      <span class="btm-nav-label">Members</span>
    </button>
    <button @click="changeSection('Settings')" :class="{ 'active': selected === 'Settings' }">
      <Settings2 />
      <span class="btm-nav-label">Settings</span>
    </button>
  </div>
</template>

<style scoped>

</style>