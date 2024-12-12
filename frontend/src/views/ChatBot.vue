<script lang="ts">
import {defineComponent, ref, provide} from 'vue'
import Sidebar from "../components/chat/sidebar/Sidebar.vue";
import Chat from "../components/chat/chat/Chat.vue";

export default defineComponent({
  name: "ChatBot",
  components: {Chat, Sidebar},
  setup() {
    const currentModuleID = ref("");
    provide('currentModuleID', currentModuleID);
  },
  mounted() {
    this.getBots();
  },
  methods: {
    async getBots() {
      this.bots = await fetch('http://127.0.0.1:8000/api/get_bots/').then((res) => res.json());
    },
  },
  data() {
    return {
      bots: []
    };
  },
})
</script>

<template>
  <main class="flex flex-row w-screen h-screen">
    <Sidebar :bots="bots" />
    <Chat />
  </main>

</template>
