<script lang="ts">
import {defineComponent, ref, computed, watch} from 'vue';
import {ChevronDown} from 'lucide-vue-next';
import BarChart from './BarChart.vue';
import {fetchChatSummary} from "../../../api";
import {useModuleStore} from "../../../store/module";

export default defineComponent({
  name: 'ModuleStatistics',
  components: {BarChart, ChevronDown},
  setup() {
    const moduleStore = useModuleStore();
    const selectedTimeframe = ref('1 week');
    const chatSummary = ref<{ 'total_chats': 0, 'total_users': 0, 'avg_questions_per_user': 0 }>({
      'total_chats': 0,
      'total_users': 0,
      'avg_questions_per_user': 0
    });

    const fetchSummary = async () => {
      try {
        chatSummary.value = await fetchChatSummary(selectedTimeframe.value);
      } catch (error) {
        console.error("Failed to fetch chat summary:", error);
      }
    };

    watch(selectedTimeframe, fetchSummary);
    watch(
        () => moduleStore.currentModule,
        fetchSummary
    );

    const getDateRange = (timeframe: string): string => {
      const now = new Date();
      const endDate = new Date(now.toUTCString());
      let startDate;

      switch (timeframe) {
        case '1 day':
          startDate = new Date(endDate);
          startDate.setUTCDate(startDate.getUTCDate() - 1);
          break;
        case '3 days':
          startDate = new Date(endDate);
          startDate.setUTCDate(startDate.getUTCDate() - 2);
          break;
        case '1 week':
          startDate = new Date(endDate);
          startDate.setUTCDate(startDate.getUTCDate() - 6);
          break;
        case '1 month':
          startDate = new Date(endDate);
          startDate.setUTCMonth(startDate.getUTCMonth() - 1);
          break;
        default:
          startDate = new Date(endDate);
          break;
      }

      const options = {year: 'numeric', month: 'long', day: 'numeric'} as const;
      return `${startDate.toLocaleDateString('en-GB', options)} – ${endDate.toLocaleDateString('en-GB', options)}`;
    };

    const title = computed(() => getDateRange(selectedTimeframe.value));
    fetchSummary();

    return {
      selectedTimeframe,
      chatSummary,
      title,
    };
  },
});
</script>

<template>
  <div class="h-full w-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4">
    <div class="mt-8 w-full flex justify-between">
      <h1 class="text-2xl">{{ title }}</h1>
      <select
          class="select select-bordered bg-base-200 select-sm max-w-xs"
          v-model="selectedTimeframe"
      >
        <option>1 day</option>
        <option>3 days</option>
        <option>1 week</option>
        <option>1 month</option>
      </select>
    </div>
    <div class="divider mt-1"></div>
    <h2 class="text-md mt-4 font-semibold">Overview</h2>
    <div class="w-full flex mt-1 min-h-64">
      <p class="text-neutral-400 w-1/3 pr-2">
        <span
            class="font-semibold">{{ chatSummary.total_users }} user{{ chatSummary.total_users > 1 ? 's' : '' }}</span>
        {{chatSummary.total_users > 1 ? 'have' : 'has'}} asked
        <span class="font-semibold">{{ chatSummary.total_chats }} questions</span> over the
        past <span class="font-semibold">{{ selectedTimeframe.toLowerCase() }}</span>,
        with an average
        of <span class="font-semibold">{{ chatSummary.avg_questions_per_user }} questions</span> per user.
      </p>
      <div class="h-full w-2/3">
        <BarChart :timeframe="selectedTimeframe.toLowerCase()"/>
      </div>
    </div>
  </div>
</template>
