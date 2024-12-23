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

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
  name: 'BarChart',
  components: {Bar},
  props : {
    timeframe: {
      type: String,
      default: 'week',
    },
    moduleId : {
      type: String,
      required: true,
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
  mounted() {
    this.fetchChartData();
  },
  methods: {
    async fetchChartData() {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/chart-data/${this.moduleId}?timeframe=${this.timeframe}`);
        if (!response.ok) {
          throw new Error('Failed to fetch chart data');
        }
        const data = await response.json();

        // Create a new chartData object to trigger reactivity
        this.chartData = {
          labels: data.labels,
          datasets: [
            {
              label: 'Questions Asked',
              data: data.values,
              backgroundColor: 'rgba(75, 192, 192, 0.6)',
            },
          ],
        };
      } catch (error) {
        console.error('Error fetching chart data:', error);
      }
    },
  },

};
</script>
