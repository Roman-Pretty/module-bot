<template>
  <div class="p-4 pt-8">
    <h2 class="font-semibold text-xs pb-2 text-neutral-50">Module Bots</h2>
    <div v-for="bot in bots" :key="bot.course_id">
      <button
          class="btn btn-ghost w-full mb-2 justify-start font-normal text-neutral-50"
          :class="{'bg-neutral-900/40': currentModule === bot.course_id}"
          @click="$emit('selectBot', bot.course_id)"
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
  emits: ['selectBot'],
  props: {
    bots: {
      type: Array,
      required: true,
    },
    currentModule: {
      type: String,
      required: true,
    },
  },
};
</script>
