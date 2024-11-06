<template>
  <div class="w-full flex justify-center">
    <input
        type="text"
        v-model="message"
        placeholder="Enter your message"
        class="w-full bg-base-200 rounded-l-full p-2 pl-6 focus:outline-none text-lg"
        @keyup.enter="emitMessage"
    />
    <div class="bg-base-200 rounded-r-full flex items-center justify-center p-2 pr-2">
     <button
        @click="emitMessage"
        :disabled="!message.trim()"
        :class="{
          'bg-neutral-900': message.trim(),
          'bg-neutral-300': !message.trim(),
          'cursor-pointer': message.trim()
        }"
        class="rounded-full min-w-10 min-h-10 flex justify-center items-center"
      >
        <ArrowUp color="white" :size="20"/>
      </button>
    </div>

  </div>
</template>

<script>
import {ArrowUp} from "lucide-vue-next";

export default {
  components: {ArrowUp},
  data() {
    return {
      message: "",
    };
  },
  methods: {
    emitMessage() {
      if (this.message.trim() === "") return;
      this.$emit("send", this.message);
      this.message = "";
    },
  },
};
</script>
