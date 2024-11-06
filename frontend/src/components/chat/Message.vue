<template>
  <div :class="['chat my-2', !bot ? 'chat-end' : 'chat-start']">
    <div class="chat-image avatar">
      <div class="w-10 rounded-full border border-qm" v-if="bot">
        <img
            alt="Bot Avatar"
            src='../../assets/bot.webp'
        />
      </div>
    </div>

    <!-- Render the parsed Markdown using v-html -->
    <div :class="['chat-bubble', bot ? 'bg-base-100 text-neutral-800' : 'text-base-200']">
      <div v-html="compiledMessage"></div>
    </div>
  </div>
</template>

<script>
// Import necessary packages
import DOMPurify from 'dompurify';
import {marked} from 'marked';

export default {
  name: 'Message',
  props: {
    message: {
      type: String,
      required: true
    },
    bot: Boolean,
  },
  computed: {
    compiledMessage() {
      return DOMPurify.sanitize(marked.parse(this.message.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, ""), { "breaks": true }));

    },
  },
};
</script>

<style>

ul > li {
  list-style-type: disc;
  margin-left: 1rem;
}
</style>
