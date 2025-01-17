<template>
  <Bar
      id="my-chart-id"
      :options="chartOptions"
      :data="chartData"
  />
</template>

<script>
import {Bar} from 'vue-chartjs';
import {Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js';
import {fetchChartData} from "../../api";
import {useModuleStore} from "../../store/module";

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
  name: 'BarChart',
  components: {Bar},
  props : {
    timeframe: {
      type: String,
      default: 'week',
    },
  },
  setup() {
    const moduleStore = useModuleStore();
    return {
      moduleStore,
    };
  },
  watch: {
    async 'moduleStore.currentModule'() {
      this.chartData = await fetchChartData(this.timeframe);
    },
  },
  data() {
    return {
      chartData: {
        labels: [],
        datasets: [
          {
            label: 'Questions Asked',
            data: [],
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
          },
        ],
      },
      chartOptions: {
        responsive: true,
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    };
  },
  async mounted() {
    this.chartData = await fetchChartData(this.timeframe);
  },
};
</script>
