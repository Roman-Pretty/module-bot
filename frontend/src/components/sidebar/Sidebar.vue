<script lang="ts">
import {defineComponent} from 'vue'
import {Module, useModuleStore} from "../../store/module";

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
  <nav class="w-1/6 bg-primary dark:bg-base-300 text-base-100 dark:text-base-content flex-col hidden md:flex ">

    <a href="http://127.0.0.1:8000/admin" target="_blank" class="text-xs font-semibold uppercase m-8">Module Bots</a>
    <ul class="flex flex-col gap-2 overflow-y-auto px-8 mb-8">
      <li @click="moduleStore.setCurrentModule(bot.id)" v-for="bot in bots" :key="bot.id"
          class="btn btn-primary dark:btn-ghost shadow-none text-base-100 dark:text-base-content justify-between font-normal "
          :class="{'btn-secondary dark:bg-base-200': moduleStore?.getCurrentModule?.id === bot.id}">
        <span class="text-nowrap truncate  py-1 hidden lg:inline-block">{{ bot.name }}</span>
        <span class="text-nowrap truncate  py-1 inline-block lg:hidden">{{ bot.id }}</span>
      </li>
    </ul>

  </nav>
</template>