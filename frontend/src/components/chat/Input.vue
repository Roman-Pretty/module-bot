<script lang="ts">
import {defineComponent} from 'vue'
import {ArrowUp} from "lucide-vue-next";

export default defineComponent({
  components: {ArrowUp},
  name: "Input",
  methods: {
    send() {
      if (this.message.trim() === "") return;
      this.$emit("sendMessage", this.message);
      this.message = "";

      // Reset the height of the textarea and label when the message is sent
      this.$nextTick(() => {
        const textarea = this.$refs.textarea as HTMLTextAreaElement;
        const label = this.$refs.label as HTMLElement;

        // Reset height after clearing the message
        textarea.style.height = 'auto';
        textarea.style.height = '1.6rem'; // Reset to the initial height of the textarea

        // Reset label height (ensure label doesn't shrink below 48px)
        label.style.height = '48px'; // Reset to the default height for the label (3rem)
      });
    },
    adjustHeight(event: Event) {
      const textarea = event.target as HTMLTextAreaElement;
      const label = this.$refs.label as HTMLElement;

      if (!textarea || !label) return;
      textarea.style.height = 'auto';
      textarea.style.height = `${textarea.scrollHeight}px`;

      const maxHeight = 186;

      // Ensure the textarea doesn't exceed the maximum height
      if (textarea.scrollHeight > maxHeight) {
        textarea.style.height = `${maxHeight}px`;
      }

      label.style.height = `${Math.max(textarea.scrollHeight + 16, 48)}px`;
    },
    handleKeydownEnter(event: KeyboardEvent) {
      if (event.shiftKey) {
        return;
      }
      // If Shift is not held down, send the message (submit the form)
      event.preventDefault();
      this.send();
    }
  },

  data() {
    return {
      message: "",
    };
  },
})
</script>

<template>
  <div class="p-4 flex items-center justify-center xl:mx-[26%] lg:mx-[20%]">
    <label class="input bg-base-200 pr-2 rounded-[1.5rem] w-full flex items-center gap-2 max-h-52" ref="label">
    <textarea
        class="grow resize-none bg-base-200 h-[1.6rem] border-none focus:border-none focus:outline-none"
        placeholder="Enter your message"
        v-model="message"
        @input="adjustHeight"
        @keydown.enter="handleKeydownEnter"
        ref="textarea"
        rows="1">
    </textarea>
      <button
          @click="send"
          class="rounded-full p-1.5"
          :disabled="!message.trim()"
          :class="{
            'bg-base-content dark:bg-base-300': message.trim(),
            'bg-base-content/30 dark:bg-base-300/50': !message.trim(),
            'cursor-pointer': message.trim()}"
      >
        <ArrowUp color="white" :size="20"/>
      </button>
    </label>


  </div>
</template>