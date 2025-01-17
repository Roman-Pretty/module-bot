<script lang="ts">
import {defineComponent} from 'vue';
import {MessageType} from "./Chat.vue";
import showdown from 'showdown';
//@ts-ignore
import {HollowDotsSpinner} from 'epic-spinners'

export default defineComponent({
  name: "Message",
  components: {HollowDotsSpinner},
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
      <div class="w-10 rounded-full border border-primary dark:border-base-content" v-if="message.bot_message">
        <img
            alt="Bot Avatar"
            src='../../../assets/bot.webp'
        />
      </div>
    </div>

    <div :class="['chat-bubble', message.bot_message ? 'bg-base-100 text-base-content bot' : 'text-base-100 bg-base-content']">
      <!--TODO: protect against XSS-->
      <div v-html="html"/>
      <div class="mt-2" v-if="message.loading">
        <hollow-dots-spinner
            :animation-duration="800"
            :dot-size="10"
            :dots-num="3"
            color="#072355"
        />
      </div>
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