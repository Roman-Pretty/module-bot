<script lang="ts">
import {defineComponent, inject} from 'vue'

export default defineComponent({
  name: "Header",
  setup() {
    const currentModuleID = inject<string>('currentModuleID');
    return {
      currentModuleID,
    };
  },
})
</script>

<template>
  <nav class="navbar bg-base-100">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl">{{ currentModuleID }}</a>
    </div>
    <div class="flex-none gap-2">
      <div class="dropdown dropdown-end mr-8">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar ">
          <div class="w-10 rounded-full">
            <img alt="Tailwind CSS Navbar component" src="../../../assets/user.jpg"/>
          </div>
        </div>
        <ul
            tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li>
            <a class="justify-between" href="http://127.0.0.1:8000/admin" target="_blank">
              Manage Modules
            </a>
          </li>
          <li>
            <RouterLink to="/addmodule">Add Module</RouterLink>
          </li>
          <li><a>Clear Chat</a></li>
          <li><a>Settings</a></li>
          <li><a>Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
</template>