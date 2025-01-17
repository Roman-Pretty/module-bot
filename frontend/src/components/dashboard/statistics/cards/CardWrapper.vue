<script lang="ts">
import {defineComponent} from 'vue'
import WeekCard from "./WeekCard.vue";
import MonthCard from "./MonthCard.vue";

export default defineComponent({
  name: "CardWrapper",
  components: {MonthCard, WeekCard}
})
</script>

<template>
  <div class="flex flex-row items-center justify-between w-full gap-2">
    <WeekCard/>
    <MonthCard/>
  </div>

</template>