<script lang="ts">
import { defineComponent, ref, watch, computed } from 'vue';
import { fetchModuleMembers } from '../../../api';
import { useModuleStore } from '../../../store/module';
import MemberEntry from "./MemberEntry.vue";

export default defineComponent({
  name: "ModuleMembers",
  components: { MemberEntry },
  setup() {
    const organizers = ref([]);
    const demonstrators = ref([]);
    const students = ref([]);
    const moduleStore = useModuleStore();

    const fetchMembers = async () => {
      try {
        const users = await fetchModuleMembers();
        organizers.value = users.organizers.map(user => ({ ...user, role: 'Organizer' }));
        demonstrators.value = users.demonstrators.map(user => ({ ...user, role: 'Demonstrator' }));
        students.value = users.students.map(user => ({ ...user, role: 'Student' }));
      } catch (error) {
        console.error("Failed to fetch module members:", error);
      }
    };

    // Watch the module and fetch members when it changes
    watch(() => moduleStore.currentModule, fetchMembers, { immediate: true });

    // Combine all members into a single list
    const members = computed(() => [
      ...organizers.value,
      ...demonstrators.value,
      ...students.value
    ]);

    return { members, moduleStore };
  }
});
</script>

<template>
  <div class="h-full w-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4">
    <div class="mt-8 flex justify-between">
      <h1 class="text-2xl">Module Members</h1>
      <div class="flex">
        <button class="btn btn-sm">Add Member</button>
      </div>
    </div>
    <div class="divider mt-1"></div>
    <ul>
      <li v-for="(member, index) in members" :key="index">
        <MemberEntry :user="member" :role="member.role" :index="index" @update:role="user.role = $event"  />
      </li>
    </ul>
  </div>
</template>

