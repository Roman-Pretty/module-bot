<template>
  <div :class="['chat my-2', user ? 'chat-end' : 'chat-start']">
    <div class="chat-image avatar">
      <div class="w-10 rounded-full" v-if="user">
        <img
            alt="User Avatar"
            src='../assets/user.jpg'
        />
      </div>
      <div class="w-10 rounded-full border" v-if="!user">
        <img
            alt="User Avatar"
            src='../assets/bot.webp'
        />
      </div>
    </div>
    <div :class="['chat-bubble', user ? '' : 'bg-base-100 text-neutral-800']">
      <!--Research Sanitation and XSS (Cross-Site Scripting) attacks-->
      <div v-html="message" class="response"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Message',
  props: {
    message: String,
    user: Boolean,
  },
}
</script>
