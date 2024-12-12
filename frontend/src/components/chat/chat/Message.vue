<script lang="ts">
import {defineComponent} from 'vue'
import {MessageType} from "../../../types"

export default defineComponent({
  name: "Message",
  props: {
    message: {
      type: MessageType,
      required: true,
    },
  },
})
</script>

<template>
  <div :class="['chat message my-2', !message.bot_message ? 'chat-end' : 'chat-start']">
    <div class="chat-image avatar">
      <div class="w-10 rounded-full border border-qm" v-if="message.bot_message">
        <img
            alt="Bot Avatar"
            src='../../../assets/bot.webp'
        />
      </div>
    </div>

    <div :class="['chat-bubble', message.bot_message ? 'bg-base-100 text-neutral-800' : 'text-base-200']">
      <span>{{message.message}}</span>
    </div>
  </div>
</template>