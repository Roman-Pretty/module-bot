<script lang="ts">
import {defineComponent} from 'vue'
import {Module, useModuleStore} from "../../../store/module.ts";

export default defineComponent({
  name: "Sidebar",
  props: {
    bots: {
      type: Array as () => Module[],
      required: true,
    },
  },
  setup() {
    const moduleStore = useModuleStore();

    return {
      moduleStore
    };
  },
})
</script>

<template>
  <nav class="w-1/6 bg-qm p-8 flex-col text-base-100 hidden md:flex">
    <h1 class="text-xs font-semibold uppercase">Module Bots</h1>
    <ul class="mt-4 flex flex-col gap-2">
      <li @click="moduleStore.setCurrentModule(bot.id)" v-for="bot in bots" :key="bot.id"
          class="btn btn-primary shadow-none text-base-100 justify-between font-normal "
          :class="{'btn-secondary': moduleStore?.getCurrentModule?.id === bot.id}">
        <span class="text-nowrap truncate  py-1 hidden lg:inline-block">{{ bot.name }}</span>
        <span class="text-nowrap truncate  py-1 inline-block lg:hidden">{{ bot.id }}</span>
      </li>
    </ul>

  </nav>
</template>