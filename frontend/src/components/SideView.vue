<template>
<div class="p-4 pt-8">
    <h2 class="font-semibold text-xs pb-2">Module Bots</h2>
    <div v-for="bot in bots" :key="bot.course_id" >
      <button class="btn w-full bg-neutral-300 mb-2 justify-start font-normal" @click="selectBot(bot.course_id)">
        Final Year Project
      </button>
      <button class="btn w-full mb-2  justify-start font-normal" @click="selectBot(bot.course_id)">
        {{ bot.name }}
      </button>
    </div>

  </div>
</template>

<script>
export default {
  name: 'SideView',
  data() {
    return {
      bots: [],
    };
  },
  methods: {
    async fetchBots() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/get_bots/');
        if (response.ok) {
          this.bots = await response.json();
        } else {
          console.error('Failed to fetch bots');
        }
      } catch (error) {
        console.error('Error fetching bots:', error);
      }
    },
    selectBot(courseId) {
    //   Handle bot logic
    },
  },
  mounted() {
    this.fetchBots();
  },
};
</script>