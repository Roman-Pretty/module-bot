<script lang="ts">
import {defineComponent} from 'vue';
import {MessageType} from "./Chat.vue";
import showdown from 'showdown';
import {CircleAlert} from 'lucide-vue-next';
//@ts-ignore
import {HollowDotsSpinner} from 'epic-spinners'

export default defineComponent({
  name: "Message",
  components: {HollowDotsSpinner, CircleAlert},
  data() {
    return {
      html: '',
      converter: new showdown.Converter(),
      error: false,
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
      let text = this.message.message || '';
      if (text.includes('ERROR:', 0)) {
        this.error = true;
        text = text.slice(6);
      }
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

    <div :class="['chat-bubble',
    message.bot_message ? 'bg-base-100 text-base-content bot max-w-full' : 'text-base-200 dark:bg-base-content max-w-[70%]',
    error ? 'bg-error/10 ' : '']">
      <!--TODO: protect against XSS-->
      <div v-if="error" class="text-error h-full flex items-center gap-2">
        <CircleAlert />
        <div class="pb-4" v-html="html"/>
      </div>
      <div v-else v-html="html"/>
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