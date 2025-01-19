<script lang="ts">
import {defineComponent, ref, onMounted} from "vue";
import {fetchAllUsersOutOfModule} from "../../../api";
import {User} from "../../../store/auth";

export default defineComponent({
  name: "AddMemberModal",
  emits: ["add-member", "close"],
  setup(_, {emit}) {
    const users = ref<User[]>([]);
    const userRoles = ref<Record<number, string>>({});
    const searchQuery = ref("");
    const isLoading = ref(true);
    const currentPage = ref(1);
    const totalPages = ref(1);
    const userAdded = ref<Record<number, boolean>>({});

    // Load users for a specific page
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

        // Mark all users as not added initially
        response.users.forEach(user => {
          userAdded.value[user.id] = false;
        });
      } catch (error) {
        console.error("Failed to fetch users:", error);
      } finally {
        isLoading.value = false;
      }
    };

    // Handle search when Enter is pressed
    const handleSearch = () => {
      loadUsers(1, searchQuery.value);
    };

    // Add a member
    const addMember = (user: User) => {
      const role = userRoles.value[user.id] || "Student";
      emit("add-member", {
        username: user.username,
        id: user.id,
        role,
      });
      userAdded.value[user.id] = true;
    };

    // Close modal
    const closeModal = () => {
      emit("close");
    };

    onMounted(() => loadUsers(currentPage.value));

    return {
      users,
      userRoles,
      searchQuery,
      isLoading,
      addMember,
      closeModal,
      loadUsers,
      currentPage,
      totalPages,
      userAdded,
      handleSearch,
    };
  },
});
</script>


<template>
  <dialog class="modal modal-open">
    <div class="modal-box max-w-[50%] h-full ml-[18vw] flex flex-col justify-between">

      <div v-if="isLoading" class="text-center">
        <h3 class="text-lg text-start">Add Members</h3>
        <div class="divider"></div>
        <div class="form-control mb-4">
          <label class="label">
            <span class="label-text">Search Users</span>
          </label>
          <input
              v-model="searchQuery"
              type="text"
              placeholder="Search by username..."
              class="input input-bordered w-full"
              @keyup.enter="handleSearch"
          />
        </div>
        <span class="loading loading-spinner loading-lg"></span>
        <p class="mt-2">Fetching users...</p>
      </div>

      <!-- User List -->
      <div v-else class="h-full w-full flex flex-col justify-between">
        <h3 class="text-lg">Add Members</h3>
        <div class="divider"></div>
        <div class="form-control mb-4">
          <label class="label">
            <span class="label-text">Search Users</span>
          </label>
          <input
              v-model="searchQuery"
              type="text"
              placeholder="Search by username..."
              class="input input-bordered w-full"
              @keyup.enter="handleSearch"
          />
        </div>

        <div class="overflow-y-auto flex-1 pt-1">
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
                    class="select select-sm select-bordered disabled:cursor-default bg-base-200"
                    :disabled="userAdded[user.id]"
                >
                  <option value="Student">Student</option>
                  <option value="Demonstrator">Demonstrator</option>
                </select>
                <button
                    @click="addMember(user)"
                    :disabled="userAdded[user.id]"
                    class="btn btn-sm mr-4 w-24"
                >
                  {{ userAdded[user.id] ? 'Added' : 'Add' }}
                </button>
              </div>
            </li>
          </ul>
        </div>

        <div class="flex flex-row">
          <div class="join mt-4 w-full flex justify-center">
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
            <button type="button" @click="closeModal" class="btn">
              Done
            </button>
          </div>
        </div>
      </div>
    </div>
  </dialog>
</template>