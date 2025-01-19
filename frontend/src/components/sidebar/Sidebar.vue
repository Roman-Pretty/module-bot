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
      required: false,
    },
  },
  watch: {
    'moduleStore.modules': {
      immediate: true,
      handler() {
        if (this.moduleStore.modules) {
          this.isLoading = false;
        }
      },
    },
  },
  setup() {
    const moduleStore = useModuleStore();
    const isLoading = moduleStore.modules === null;

    return {
      moduleStore,
      isLoading,
    };
  },
})
</script>

<template>
  <nav class="w-[18%] bg-primary dark:bg-base-300 text-base-100 dark:text-base-content flex-col hidden md:flex overflow-x-hidden">
    <a href="http://127.0.0.1:8000/admin" target="_blank" class="text-xs font-semibold uppercase m-8">
      Module Bots
    </a>

    <div v-if="isLoading" class="flex justify-center items-center px-8 mb-8">
      <div class="text-center">
        <span class="loading loading-spinner loading-md"></span>
        <p class="mt-2 text-xs">Loading modules...</p>
      </div>
    </div>

    <div v-else-if="(moduleStore?.modules?.length ?? 0) <= 0">
      <div class="flex justify-center items-center px-8">
          <p class="mt-2 text-xs">No modules found</p>
      </div>
    </div>

    <ul v-else class="flex flex-col gap-2 overflow-y-auto px-8 mb-8">
      <li
        @click="moduleStore.setCurrentModule(bot.id)"
        v-for="bot in bots"
        :key="bot.id"
        class="z-10 relative btn btn-primary dark:btn-ghost shadow-none text-base-100 dark:text-base-content justify-between font-normal"
        :class="{
          'btn-secondary dark:bg-base-200': moduleStore?.getCurrentModule?.id === bot.id,
        }"
      >
        <span class="text-nowrap truncate py-1 hidden lg:inline-block max-w-full">
          {{ bot.name }}
        </span>
        <span class="text-nowrap truncate py-1 inline-block lg:hidden max-w-full">
          {{ bot.id }}
        </span>
      </li>
    </ul>
  </nav>
</template>
