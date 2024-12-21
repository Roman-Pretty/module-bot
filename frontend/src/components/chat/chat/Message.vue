<script lang="ts">
import {defineComponent} from 'vue';
import {MessageType} from "../../../types";
import showdown from 'showdown';

export default defineComponent({
  name: "Message",
  data() {
    return {
      html: '',
      converter: new showdown.Converter(),
    };
  },
  props: {
    message: {
      type: Object as () => MessageType,
      required: true,
    },
  },
  mounted() {
    this.updateHtml();
  },
  watch: {
    'message.message': {
      immediate: true,
      handler() {
        this.updateHtml();
      },
    },
  },
  methods: {
    updateHtml() {
      // Protect against null or undefined messages
      const text = this.message.message || '';
      this.converter.setOption('simpleLineBreaks', true);
      this.html = this.converter.makeHtml(text);
    },
  },
});
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

    <div :class="['chat-bubble', message.bot_message ? 'bg-base-100 text-neutral-800 bot' : 'text-base-200']">
      <!--TODO: protect against XSS-->
      <div v-html="html"/>
    </div>
  </div>
</template>

<style>
  .bot p, .bot ol {
    padding-top: 1rem;
  }

  .bot li {
    margin-left: 2rem;
    list-style-type: disc;
  }

  .bot a {
    color: #0d3273;
    text-decoration: underline;
  }

</style>