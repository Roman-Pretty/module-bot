<script lang="ts">

/**
 * Sidebar of the page, displays a list of modules enrolled in
 * on the home page, or a list of modules organized on the dashboard.
 *
 * If there are no modules, it displays a message saying "No modules found".
 *
 */
import { defineComponent, computed } from 'vue';
import { Module, useModuleStore } from "../../store/module";
import { Ellipsis, ChevronDown } from "lucide-vue-next";

export default defineComponent({
  name: "Sidebar",
  components: { Ellipsis, ChevronDown },
  props: {
    bots: {
      type: Array as () => Module[],
      required: false,
    },
    isDashboard: {
      type: Boolean,
      default: false,
    },
  },
  setup(props) {
    const moduleStore = useModuleStore();
    const isLoading = computed(() =>
      props.isDashboard ? moduleStore.organizedModules === null : moduleStore.modules === null
    );

    return {
      moduleStore,
      isLoading,
    };
  },
});
</script>


<template>
  <div class="dropdown md:hidden absolute top-2 left-2">
    <div tabindex="0" role="button" class="btn m-1 w-36 flex flex-nowrap flex-row justify-between">
      <span class=" truncate text-nowrap max-w-[80%]">
        {{ moduleStore.getCurrentModule?.id || 'Select' }}
      </span>
      <ChevronDown/>
    </div>
    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
      <li
          @click="moduleStore.setCurrentModule(bot.id)"
          v-for="bot in bots"
          :key="bot.id"
      >
         <span class="text-nowrap truncate py-1 inline-block lg:hidden max-w-full">
          {{ bot.id }}
        </span>
      </li>
    </ul>
  </div>
  <nav
      class="w-[18%] bg-primary dark:bg-base-300 text-base-100 dark:text-base-content flex-col hidden md:flex overflow-x-hidden">
    <h1 class="text-xs font-semibold uppercase m-8">
      Module Bots
    </h1>

    <div v-if="isLoading" class="flex justify-center items-center px-8 mb-8 max-w-full overflow-x-hidden">
      <div class="text-center">
        <span class="loading loading-spinner loading-md"></span>
        <p class="mt-2 text-xs">Loading modules...</p>
      </div>
    </div>

    <div v-else-if="(bots?.length ?? 0) <= 0">
      <div class="flex justify-center items-center px-8">
        <p class="mt-2 text-xs">No modules found</p>
      </div>
    </div>

    <ul v-else class="flex flex-col gap-2 overflow-y-auto h-full px-8 mb-8">
      <li
          @click="moduleStore.setCurrentModule(bot.id)"
          v-for="bot in bots"
          :title="bot.name"
          :key="bot.id"
          class="z-10 relative btn btn-primary dark:btn-ghost shadow-none text-base-100 dark:text-base-content justify-between font-normal overflow-x-hidden max-w-full"
          :class="{
          'btn-secondary dark:bg-base-200': moduleStore?.getCurrentModule?.id === bot.id,
        }"
      >
        <span class="text-nowrap truncate py-1 hidden lg:inline-block max-w-full overflow-x-hidden">
          {{ bot.name }}
        </span>
        <span class="text-nowrap truncate py-1 inline-block lg:hidden max-w-full overflow-x-hidden">
          {{ bot.id }}
        </span>
      </li>
    </ul>
  </nav>
</template>
