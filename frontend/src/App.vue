<template>
  <div class="flex flex-col h-screen">
    <div class="flex-1 overflow-y-auto p-4 px-[30vw]">
      <Message
          v-for="m in messages"
          :message="m.message"
          :user="m.user"
      />
      <div v-if="messages.length === 0" class="flex justify-center items-center h-full">
        <h1 class="text-3xl">What can I help you with?</h1>
      </div>

    </div>
    <div class="flex justify-center p-10 px-[30vw]">
      <div class="w-full  p-2 bg-base-200 rounded-full flex justify-center">
        <input
            type="text"
            v-model="display_message"
            placeholder="Enter your message"
            class="ml-4 w-full bg-base-200 rounded-full mr-2 focus:outline-none text-lg"
            @keyup.enter="sendMessage"

        />
        <button
            @click="sendMessage"
            class="rounded-full bg-neutral-900 min-w-10 min-h-10 flex justify-center items-center"
        >
          <ArrowUp
              color="white"
              :size="20"
          />
        </button>
      </div>
    </div>
  </div>
</template>


<script>
import Message from "./components/Message.vue";
import {ArrowUp} from 'lucide-vue-next';

export default {
  components: {Message, ArrowUp},
  data() {
    return {
      message: '',
      display_message: '',
      response_data: '',
      messages: [],
    }
  },
  methods: {
    async sendMessage() {
      this.message = this.display_message;
      this.display_message = '';
      this.messages.push({
        message: this.message,
        user: true,
      });
      try {
        const response = await fetch('http://127.0.0.1:8000/api/embedding/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({
            'message': this.message,
          })
        });
        const data = await response.json();
        if (response.ok) {
          this.response_data = data.response;
          this.messages.push({
            message: data.response,
            user: false,
          });
        } else {
          this.response_data = data.error || 'Error occurred';
        }
      } catch (error) {
        console.error('Error:', error);
        this.response_data = 'Failed to fetch response';
      }
    },
  }
}
</script>
