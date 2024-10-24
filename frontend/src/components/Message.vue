<template>
  <div :class="['chat my-2', !bot ? 'chat-end' : 'chat-start']">
    <div class="chat-image avatar">
      <div class="w-10 rounded-full" v-if="user">
        <img
            alt="User Avatar"
            src='../assets/user.jpg'
        />
      </div>
      <div class="w-10 rounded-full border" v-if="bot">
        <img
            alt="User Avatar"
            src='../assets/bot.webp'
        />
      </div>
    </div>
    <div :class="['chat-bubble', !bot ? '' : 'bg-base-100 text-neutral-800']">
      <div v-if="message.includes('\n')">
        <div v-for="(line, index) in message.split('\n')" :key="index">
          {{ line }}
          <br/>
        </div>
      </div>

      <div v-else>
        {{ message }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Message',
  props: {
    message: String,
    bot: Boolean,
  },
}
</script>
