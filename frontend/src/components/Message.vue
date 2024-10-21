<template>
  <div :class="['chat', user ? 'chat-end' : 'chat-start']">
    <div class="chat-image avatar" v-if="user">
      <div class="w-10 rounded-full" >
        <img
          alt="User Avatar"
          src='../assets/user.jpg'
        />
      </div>
    </div>
    <div :class="['chat-bubble', user ? '' : 'bg-base-100 text-neutral-800']">
      {{ message }}
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
