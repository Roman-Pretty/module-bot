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
    },
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
    <label class="input bg-base-200 pr-2 rounded-full w-full flex items-center gap-2">
      <input type="text" class="grow" placeholder="Enter your message" v-model="message" @keyup.enter="send"/>
      <button @click="send" class=" rounded-full p-1.5 " :disabled="!message.trim()"
              :class="{
              'bg-neutral-800': message.trim(),
              'bg-neutral-300': !message.trim(),
              'cursor-pointer': message.trim()}"
      >
        <ArrowUp color="white" :size="20"/>
      </button>
    </label>
  </div>
</template>