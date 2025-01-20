<script lang="ts">
import {defineComponent, ref, onMounted} from "vue";
import {fetchAllUsersOutOfModule} from "../../../api";
import {User} from "../../../store/auth";
import {UserRoundCheck, UserRoundPlus} from "lucide-vue-next";

export default defineComponent({
  name: "AddMemberModal",
  emits: ["add-member"],
  components: {UserRoundCheck, UserRoundPlus},
  setup(_, {emit}) {
    const users = ref<User[]>([]);
    const userRoles = ref<Record<number, string>>({});
    const searchQuery = ref("");
    const isLoading = ref(true);
    const currentPage = ref(1);
    const totalPages = ref(1);
    const userAdded = ref<Record<number, boolean>>({});

    const loadUsers = async (page: number, query: string = '') => {
      try {
        isLoading.value = true;
        const response = await fetchAllUsersOutOfModule(page, query);
        users.value = response.users;
        totalPages.value = response.total_pages;
        currentPage.value = response.current_page;

        userRoles.value = response.users.reduce(
            (roles, user) => ({...roles, [user.id]: "Student"}),
            {}
        );

        response.users.forEach(user => {
          userAdded.value[user.id] = false;
        });
      } catch (error) {
        console.error("Failed to fetch users:", error);
      } finally {
        isLoading.value = false;
      }
    };

    const handleSearch = () => {
      loadUsers(1, searchQuery.value);
    };

    const exitModal = async () => {
      searchQuery.value = "";
      await loadUsers(1);
    }

    const addMember = (user: User) => {
      const role = userRoles.value[user.id] || "Student";
      emit("add-member", {
        username: user.username,
        id: user.id,
        role,
      });
      userAdded.value[user.id] = true;
    };

    onMounted(() => loadUsers(currentPage.value));

    return {
      users,
      userRoles,
      searchQuery,
      isLoading,
      addMember,
      loadUsers,
      currentPage,
      exitModal,
      totalPages,
      userAdded,
      handleSearch,
    };
  },
});
</script>


<template>
  <!-- Open the modal using ID.showModal() method -->
  <dialog id="add_modal" class="modal">
    <div class="modal-box w-11/12 max-w-5xl h-full flex flex-col">
      <div class="flex w-full justify-between items-center">
        <h3 class="text-lg ">Add Member</h3>
        <div class="form-control">
          <label class="label hidden">
            <span class="label-text">Search Users</span>
          </label>
          <input
              v-model="searchQuery"
              type="text"
              placeholder="Search by username..."
              class="input input-bordered input-sm bg-base-200 w-full"
              @keyup.enter="handleSearch"
          />
        </div>
      </div>

      <div class="divider"></div>
      <div v-if="isLoading" class="text-center h-full">
        <span class="loading loading-spinner loading-lg"></span>
        <p class="mt-2">Fetching users...</p>
      </div>

      <div v-else class="overflow-y-auto h-full pt-1">
        <ul class="space-y-2">
          <li
              v-for="user in users"
              :key="user.id"
              class="flex justify-between items-center border-b pb-2"
          >
            <p class="font-medium">{{ user.username }}</p>
            <div class="flex items-center gap-2">
              <select
                  v-model="userRoles[user.id]"
                  class="select sm:select-sm max-w-20 sm:max-w-none select-bordered disabled:cursor-default bg-base-200"
                  :disabled="userAdded[user.id]"
              >
                <option value="Student">Student</option>
                <option value="Demonstrator">Demonstrator</option>
              </select>
              <button
                  @click="addMember(user)"
                  :disabled="userAdded[user.id]"
                  class="btn sm:btn-sm mr-4 sm:w-24"
              >
                <span class="sm:inline-block hidden">
                  {{ userAdded[user.id] ? 'Added' : 'Add' }}
                </span>
                <span class="inline-block sm:hidden">
                  <UserRoundCheck v-if="userAdded[user.id]"/>
                  <UserRoundPlus v-else/>
                </span>
              </button>
            </div>
          </li>
        </ul>
      </div>
      <div class="flex flex-row">
        <div class="join mt-4 w-full flex justify-center items-end">
          <button
              v-for="page in totalPages"
              :key="page"
              class="join-item btn"
              :class="{'btn-active': currentPage === page}"
              @click="loadUsers(page)"
          >
            {{ page }}
          </button>
        </div>
        <div class="modal-action">
          <form method="dialog">
            <button class="btn" @click="exitModal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </dialog>
</template>