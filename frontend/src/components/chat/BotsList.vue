<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
  name: "BotsList",
  emits: ['setCurrentModule'],
  props: {
    bots: {
      type: Array,
      required: true,
    },
  },
})
</script>

<template>
  <div class="my-10">
    <div v-for="bot in bots" :key="bot.course_id" class="flex flex-row  max-w-[26vw] flex-wrap items-center justify-center">
      <button @click="$emit('setCurrentModule', bot.course_id)"
              class="mx-2 mb-2 text-slate-800 transition py-2 hover:bg-qm hover:border-neutral-50 hover:text-neutral-50 border rounded-full border-slate-800 w-24 overflow-hidden">
        <span class="text-start  max-w-full text-nowrap truncate ">{{ bot.course_id }}</span>
      </button>
    </div>
  </div>
</template>
