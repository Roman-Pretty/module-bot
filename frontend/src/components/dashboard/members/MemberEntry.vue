<script lang="ts">
import { defineComponent, ref } from 'vue';
import { useAuthStore, User } from '../../../store/auth';
import { UserRoundMinus } from 'lucide-vue-next';
import { updateUserRole } from "../../../api";

export default defineComponent({
  name: "MemberEntry",
  methods: {
    useAuthStore,
    async removeMember() {
      this.$emit('remove', this.user);
    },
  },
  components: { UserRoundMinus },
  props: {
    user: {
      type: Object as () => User,
      required: true,
    },
    index: {
      type: Number,
      default: 0,
    },
    role: {
      type: String,
      required: true,
    },
  },
  setup() {
    const newRole = ref('');
    const currentRole = ref('');

    const handleRoleChange = (role: string, user: User) => {
      if (role !== currentRole.value) {
        currentRole.value = role;
        newRole.value = role;
        updateUserRole(user.id, role);
      }
    };

    return {
      newRole,
      currentRole,
      handleRoleChange,
    };
  },
});
</script>

<template>
  <div class="w-full flex justify-between p-6 items-center" :class="{'bg-base-200': index % 2 === 0}">
    <div class="flex items-center gap-4">
      <div class="rounded-full w-10 h-10 bg-base-300 hidden sm:flex items-center justify-center font-bold uppercase">
        {{ user.username.charAt(0) }}
      </div>
      <span class="font-semibold capitalize">{{ user.username }}</span>
    </div>

    <div class="flex items-center gap-4">
      <select
        class="select w-full max-w-xs disabled:cursor-default bg-base-300"
        :disabled="user.id === useAuthStore()?.user?.id || role == 'Organizer'"
        :value="role"
        @change="handleRoleChange(($event.target as HTMLInputElement).value, user)"
      >
        <option value="Student">Student</option>
        <option value="Demonstrator">Demonstrator</option>
        <option value="Organizer" disabled>Organiser</option>
      </select>
      <button
        @click="removeMember"
        :disabled="user.id === useAuthStore()?.user?.id"
        :class="[user.id === useAuthStore()?.user?.id ? 'text-base-300 hover:text-base-300' : 'text-base-content hover:text-error']"
      >
        <UserRoundMinus />
      </button>
    </div>
  </div>
</template>
