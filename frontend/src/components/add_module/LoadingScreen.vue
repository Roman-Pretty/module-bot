<script lang="ts">
import {defineComponent, ref, onMounted, onBeforeUnmount} from 'vue';
//@ts-ignore
import {FulfillingSquareSpinner} from 'epic-spinners';

export default defineComponent({
  name: "LoadingScreen",
  components: {FulfillingSquareSpinner},
  setup() {
    const messages = [
      "Initializing...",
      "Configuring settings...",
      "Fetching data...",
      "Setting up resources...",
      "Generating module bot...",
      "Preparing conversation...",
      "Finalizing setup...",
      "Almost done..."
    ];
    const currentMessage = ref(messages[0]);
    let messageIndex = 0;
    let intervalId: number | undefined;

    onMounted(() => {
      intervalId = window.setInterval(() => {
        messageIndex = (messageIndex + 1) % messages.length;
        currentMessage.value = messages[messageIndex];
      }, Math.random() * (6500 - 5500) + 6500);
    });

    onBeforeUnmount(() => {
      if (intervalId) clearInterval(intervalId);
    });

    return {
      currentMessage
    };
  }
});
</script>

<template>
  <div class="w-full flex flex-col items-center">
    <fulfilling-square-spinner
        :animation-duration="4000"
        :size="50"
        color="#fff"
    />
    <h1 class="text-md capitalize font-semibold  text-center mt-4 text-white">{{ currentMessage }}</h1>
  </div>
</template>

<style scoped>
</style>
