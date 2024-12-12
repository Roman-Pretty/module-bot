<script lang="ts">
import {defineComponent} from 'vue';
import Message from "./Message.vue";
import {MessageType} from "../../../types";

export default defineComponent({
  name: "Conversation",
  components: {Message},
  props: {
    messages: {
      type: Array as () => MessageType[],
      required: true,
    },
  },
});
</script>

<template>
  <Message v-for="msg in messages" :key="msg.id" :message="msg"/>
</template>
