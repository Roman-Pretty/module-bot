<script lang="ts">
import {defineComponent} from 'vue'
import {Module, useModuleStore} from "../../store/module";
import {Ellipsis} from "lucide-vue-next";

export default defineComponent({
  name: "Sidebar",
  components: {Ellipsis},
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
  <nav class="w-[18%] bg-primary dark:bg-base-300 text-base-100 dark:text-base-content flex-col hidden md:flex overflow-x-hidden">
    <a href="http://127.0.0.1:8000/admin" target="_blank" class="text-xs font-semibold uppercase m-8">Module Bots</a>
    <ul class="flex flex-col gap-2 overflow-y-auto px-8 mb-8 ">
      <li @click="moduleStore.setCurrentModule(bot.id)" v-for="bot in bots" :key="bot.id"
          class="z-10 relative btn btn-primary dark:btn-ghost shadow-none text-base-100 dark:text-base-content justify-between font-normal"
          :class="{'btn-secondary dark:bg-base-200': moduleStore?.getCurrentModule?.id === bot.id}">
        <span class="text-nowrap truncate  py-1 hidden lg:inline-block max-w-full ">{{ bot.name }}</span>
        <span class="text-nowrap truncate  py-1 inline-block lg:hidden max-w-full ">{{ bot.id }}</span>
<!--        <div class="hidden group-hover:flex absolute right-3 z-20 hover:text-base-100">-->
<!--          <Ellipsis  tabindex="0" role="button" />-->
<!--        </div>-->
      </li>
    </ul>

  </nav>
</template>