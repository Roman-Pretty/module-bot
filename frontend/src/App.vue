<template>
  <div class="flex flex-col h-screen">
    <div class="flex justify-center mt-4">
        <button @click="clearChat" class="text-xs hover:underline">
          Clear Chat
        </button>
      </div>
    <div class="flex-1 overflow-y-auto p-4 px-[30vw]">
      <Message
          v-for="m in messages"
          :message="m.message"
          :bot="m.bot"
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
    };
  },
  mounted() {
    this.fetchChatLogs();
  },
  methods: {
    async fetchChatLogs() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/chatlogs/');
        if (!response.ok) {
          throw new Error('Failed to fetch chat logs');
        }
        const data = await response.json();
        this.messages = data;
      } catch (error) {
        console.error('Error:', error);
      }
    },
    async sendMessage() {
      this.message = this.display_message;
      this.display_message = '';

      this.messages.push({
        message: this.message,
        bot: false,
      });

      // Save user message to the backend
      try {
        await fetch('http://127.0.0.1:8000/api/save-chatlog/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            username: 'roman',  // TODO: replace with user and module
            module_id: 'ECS417U',
            message: this.message,
            bot_message: false
          })
        });
      } catch (error) {
        console.error('Error saving user message:', error);
      }

      // Send the message to the embedding API and get the bot response
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

          // Push the bot response to the messages array
          this.messages.push({
            message: data.response,
            bot: true,
          });

          // Save bot message to the backend
          try {
            await fetch('http://127.0.0.1:8000/api/save-chatlog/', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                username: 'roman',  // TODO: replace with user and module
                module_id: 'ECS417U',
                message: data.response,
                bot_message: true
              })
            });
          } catch (error) {
            console.error('Error saving bot message:', error);
          }

        } else {
          this.response_data = data.error || 'Error occurred';
        }
      } catch (error) {
        console.error('Error:', error);
        this.response_data = 'Failed to fetch response';
      }
    },
    async clearChat() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/clear-chatlogs/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            username: 'roman',  // TODO: replace with user and module
            module_id: 'ECS417U'
          })
        });

        if (response.ok) {
          // Clear the local messages and chatLogs arrays after successful deletion
          this.messages = [];
          this.chatLogs = [];
        } else {
          const errorData = await response.json();
          console.error('Error clearing chat:', errorData.message);
        }
      } catch (error) {
        console.error('Error clearing chat:', error);
      }
    },

  }
}
</script>
