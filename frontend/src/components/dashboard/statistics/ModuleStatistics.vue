<script lang="ts">
import {defineComponent, ref, computed, watch} from 'vue';
import {ChevronDown} from 'lucide-vue-next';
// @ts-ignore - This is a custom component and is definitely there!
import BarChart from './BarChart.vue';
import {downloadChatLogs, fetchChatSummary} from "../../../api";
import {useModuleStore} from "../../../store/module";

export default defineComponent({
  name: 'ModuleStatistics',
  methods: {downloadChatLogs},
  components: {BarChart, ChevronDown},
  setup() {
    const moduleStore = useModuleStore();
    const selectedTimeframe = ref('1 week');
    const chatSummary = ref<{ 'total_chats': number, 'total_users': number, 'avg_questions_per_user': number }>({
      'total_chats': 0,
      'total_users': 0,
      'avg_questions_per_user': 0
    });

    const isLoading = ref(true);

    const fetchSummary = async () => {
      try {
        isLoading.value = true;
        chatSummary.value = await fetchChatSummary(selectedTimeframe.value);
        isLoading.value = false;
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
          startDate.setUTCDate(startDate.getUTCDate());
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
      if (startDate.toDateString() === endDate.toDateString()) {
        return startDate.toLocaleDateString('en-GB', options);
      }
      return `${startDate.toLocaleDateString('en-GB', options)} – ${endDate.toLocaleDateString('en-GB', options)}`;
    };

    const title = computed(() => getDateRange(selectedTimeframe.value));
    fetchSummary();

    return {
      selectedTimeframe,
      chatSummary,
      title,
      isLoading
    };
  },
});
</script>

<template>
  <div class="h-full w-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4">

    <div v-if="isLoading" class="flex justify-center items-center h-full">
      <div class="text-center">
        <span class="loading loading-spinner loading-lg"></span>
        <p class="mt-2">Loading statistics...</p>
      </div>
    </div>

    <div class="mt-8 w-full flex justify-between" v-else>
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
    <div class="w-full flex flex-col sm:flex-row mt-1 min-h-64">
      <div class="sm:w-1/3 pr-2 mt-1 ">
        <h2 class="text-md  font-semibold">Overview</h2>
        <p class="text-base-content/50 mt-1">
        <span
            class="font-semibold">{{ chatSummary.total_users }} user{{ chatSummary?.total_users != 1 ? 's' : '' }}</span>
          {{ chatSummary.total_users != 1 ? 'have' : 'has' }} asked
          <span class="font-semibold">{{ chatSummary.total_chats }} questions</span> over the
          past <span class="font-semibold">{{ selectedTimeframe.toLowerCase() }}</span>,
          with an average
          of <span class="font-semibold">{{ chatSummary.avg_questions_per_user }} questions</span> per user.
        </p>
      </div>
      <div class="h-full sm:w-2/3 self-center">
        <BarChart :timeframe="selectedTimeframe.toLowerCase()"/>
      </div>
    </div>
    <div class="w-full card bg-base-200 rounded-b-none border-base-300 border mt-16">
      <div class="card-body flex flex-row items-center justify-between">
        <h1 class="text-md font-semibold">Export usage data</h1>
      </div>
    </div>
    <div class="card w-full rounded-t-none border-base-300 border-t-0 border mb-20">
      <div class="card-body flex flex-row items-center justify-between">
        <p class="text-base-content/50">Export all anonymised usage data for this module as a CSV file.</p>
        <button @click="downloadChatLogs" class="btn bg-base-100">Export</button>
      </div>
    </div>

  </div>
</template>
