<script lang="ts">
import { defineComponent, ref, computed, watch } from "vue";
import { addMemberToModule, fetchModuleMembers, removeMemberFromModule } from "../../../api";
import { useModuleStore } from "../../../store/module";
import { User } from "../../../store/auth";
import MemberEntry from "./MemberEntry.vue";
import AddMemberModal from "./AddMemberModal.vue";

interface ModuleMembers {
  organizers: User[];
  demonstrators: User[];
  students: User[];
}

export default defineComponent({
  name: "ModuleMembers",
  components: { MemberEntry, AddMemberModal },
  setup() {
    const organizers = ref<(User & { role: string })[]>([]);
    const demonstrators = ref<(User & { role: string })[]>([]);
    const students = ref<(User & { role: string })[]>([]);
    const moduleStore = useModuleStore();

    const isLoading = ref(true);
    const searchQuery = ref("");
    const isModalOpen = ref(false);

    const memberToRemove = ref<User | null>(null);

    const fetchMembers = async () => {
      try {
        isLoading.value = true;
        const users: ModuleMembers = await fetchModuleMembers();
        isLoading.value = false;
        organizers.value = users.organizers.map(user => ({ ...user, role: "Organizer" }));
        demonstrators.value = users.demonstrators.map(user => ({ ...user, role: "Demonstrator" }));
        students.value = users.students.map(user => ({ ...user, role: "Student" }));
      } catch (error) {
        console.error("Failed to fetch module members:", error);
      }
    };

    watch(() => moduleStore.currentModule, fetchMembers, { immediate: true });

    const allMembers = computed(() => [
      ...organizers.value,
      ...demonstrators.value,
      ...students.value,
    ]);

    const members = computed(() => {
      if (!searchQuery.value) {
        return allMembers.value;
      }
      const query = searchQuery.value.toLowerCase();
      return allMembers.value.filter(
        (member) =>
          member.username.toLowerCase().includes(query) ||
          member.role.toLowerCase().includes(query)
      );
    });

    const addMember = async (newMember: { id: number; username: string; role: string }) => {
      const roleArray =
        newMember.role === "Organizer"
          ? organizers
          : newMember.role === "Demonstrator"
          ? demonstrators
          : students;

      roleArray.value.push(newMember as User & { role: string });
      await addMemberToModule(newMember.id, newMember.role);
    };

    const showRemoveModal = (member: User) => {
      memberToRemove.value = member;
      document.getElementById('remove_modal').showModal()
    };

    const removeMember = async () => {
      if (memberToRemove.value) {
        await removeMemberFromModule(memberToRemove.value.id);
        fetchMembers();
      }
    };

    return {
      members,
      moduleStore,
      isLoading,
      searchQuery,
      isModalOpen,
      addMember,
      showRemoveModal,
      removeMember,
    };
  },
});
</script>

<template>
  <div class="h-full w-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4">
    <div v-if="isLoading" class="flex justify-center items-center h-full">
      <div class="text-center">
        <span class="loading loading-spinner loading-lg"></span>
        <p class="mt-2">Loading members...</p>
      </div>
    </div>

    <div class="mt-8 flex justify-between" v-else>
      <h1 class="text-2xl">Module Members</h1>
      <div class="flex gap-2">
        <input
          v-model="searchQuery"
          type="text"
          placeholder="Search Members..."
          class="input input-sm max-w-xs bg-base-200"
        />
        <button @click="isModalOpen = true" class="btn btn-sm">Add Members</button>
      </div>
    </div>
    <div class="divider mt-1"></div>
    <ul>
      <li v-for="(member, index) in members" :key="index">
        <MemberEntry :user="member" :role="member.role" :index="index" @remove="showRemoveModal(member)" />
      </li>
    </ul>

    <AddMemberModal
      v-if="isModalOpen"
      @add-member="addMember"
      @close="isModalOpen = false"
    />

    <dialog id="remove_modal" class="modal">
      <form class="modal-box" method="dialog">
        <h3 class="text-lg ">Are you sure you want to remove this member?</h3>
        <div class="divider"></div>
          <p class="mb-12">If you wish to add them back, you will have to do so manually!</p>
        <div class="modal-action">
          <button class="btn" @click="removeMember">Yes, Remove</button>
          <button class="btn btn-ghost">Cancel</button>
        </div>
      </form>
    </dialog>
  </div>
</template>
