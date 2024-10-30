<template>
  <div class="p-4 pt-8 ">
    <h2 class="font-semibold text-xs pb-2">Module Bots</h2>
    <div v-for="bot in bots" :key="bot.course_id">
      <button
          class="btn btn-ghost w-full mb-2 justify-start font-normal"
          :class="{'bg-neutral-300': currentModule === bot.course_id, 'bg-default-class': currentModule !== bot.course_id}"
          @click="selectBot(bot.course_id)"
      >
        <span class="text-start text-nowrap truncate h-4">
        {{ bot.name }}
        </span>
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
      currentModule: "ECS417U",
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
      this.currentModule = courseId;
      this.updateModuleOnServer(courseId);
      this.$emit('module-changed', courseId);
    },
    async updateModuleOnServer(courseId) {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/set_current_module/', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ course_id: courseId }),
        });

        if (!response.ok) {
          console.error('Failed to update current module on server');
        }
      } catch (error) {
        console.error('Error updating module on server:', error);
      }
    },
  },
  mounted() {
    this.fetchBots();
  },
};
</script>
