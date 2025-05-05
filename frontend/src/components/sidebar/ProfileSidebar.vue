<script lang="ts">
/**
 * A simple sidebar component for the profile page, as the
 * user should not switch modules here.
 */

import {defineComponent} from 'vue'

export default defineComponent({
  name: "ProfileSidebar"
})
</script>

<template>
  <nav class="w-[18%] bg-secondary dark:bg-base-300 text-secondary-content dark:text-base-content flex-col hidden md:flex overflow-x-hidden">
    <h1 class="text-xs font-semibold uppercase m-8 cursor-default">My Profile</h1>
    <ul class="flex flex-col gap-2 overflow-y-auto px-8 mb-8 ">
      <li class="z-10 relative btn btn-secondary bg-[#072355] dark:bg-none dark:btn-ghost shadow-none text-base-100 dark:text-base-content justify-between font-normal">
        <span class="text-nowrap truncate  py-1 hidden lg:inline-block max-w-full ">Overview</span>
      </li>
<!--      <li class="z-10 relative btn btn-secondary dark:btn-ghost shadow-none text-base-100 dark:text-base-content justify-between font-normal">-->
<!--        <span class="text-nowrap truncate  py-1 hidden lg:inline-block max-w-full ">Modules</span>-->
<!--      </li>-->
    </ul>
  </nav>
</template>