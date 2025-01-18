<script lang="ts">
import {defineComponent, ref} from 'vue';
import {useAuthStore, User} from '../../../store/auth';
import {UserRoundMinus} from 'lucide-vue-next';

export default defineComponent({
  name: "MemberEntry",
  methods: {useAuthStore},
  components: {UserRoundMinus},
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

    const handleRoleChange = (role: string) => {
      if (role !== currentRole.value) {
        currentRole.value = role;
        newRole.value = role;

        // TODO: Update the role of the user

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
      <div class="rounded-full w-10 h-10 bg-base-300 flex items-center justify-center font-bold uppercase">
        {{ user.username.charAt(0) }}
      </div>
      <span class="font-semibold capitalize">
        {{ user.username }}
      </span>
      <span class="text-base-content/70">
         {{ user.email }}
      </span>
    </div>

    <div class="flex items-center gap-4">
      <select class="select w-full max-w-xs bg-base-300 disabled:cursor-default" :disabled="user.id === useAuthStore().user.id" :value="role"
              @change="handleRoleChange($event.target.value)">
        <option value="Student">Student</option>
        <option value="Demonstrator">Demonstrator</option>
        <option value="Organizer">Organiser</option>
      </select>
      <button class="text-base-content"
              :disabled="user.id === useAuthStore().user.id"
              :class="[user.id === useAuthStore().user.id ? 'text-base-300 hover:text-base-300' : ' hover:text-error ']">
        <UserRoundMinus/>
      </button>
    </div>
  </div>
</template>
