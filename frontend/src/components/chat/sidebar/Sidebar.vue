<script lang="ts">
import {defineComponent, inject} from 'vue'
import {ModuleBotType} from "../../../types";

export default defineComponent({
  name: "Sidebar",
  setup() {
    const currentModuleID = inject<string>('currentModuleID');
    return {
      currentModuleID,
    };
  },
  props: {
    bots: {
      type: Array as () => ModuleBotType[],
      required: true,
    },
  },
  methods: {
    selectBot(course_id: string) {
      this.currentModuleID = course_id;
    },
  }
})
</script>

<template>
  <nav class="w-1/6 bg-qm p-8 flex-col text-base-100 hidden md:flex">
    <h1 class="text-xs font-semibold uppercase">Module Bots</h1>
    <ul class="mt-4 flex flex-col gap-2">
      <li @click="selectBot(bot.course_id)" v-for="bot in bots" :key="bot.course_id"
          class="btn btn-primary shadow-none text-base-100 justify-between font-normal "
          :class="{'btn-secondary': currentModuleID === bot.course_id}">
        <span class="text-nowrap truncate  py-1 hidden lg:inline-block">{{ bot.name }}</span>
        <span class="text-nowrap truncate  py-1 inline-block lg:hidden">{{ bot.course_id }}</span>
      </li>
    </ul>
  </nav>
</template>