<script lang="ts">
import {defineComponent} from 'vue'
import {useModuleStore} from "../../../store/module";

export default defineComponent({
  name: "ModuleSettings",
  methods: {useModuleStore}
})
</script>

<template>
  <div class="h-full w-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4">
    <h1 class="text-2xl mt-8">General</h1>
    <div class="divider mt-1"></div>

    <h2 class="text-md mt-4 font-semibold">Module Name</h2>
    <input type="text" class="input input-bordered bg-base-200 input-sm mt-1" placeholder="Module Name"/>

    <div class="flex items-center mt-4 gap-4">
      <input type="checkbox" checked="checked" class="checkbox checkbox-sm" id="enable-chat"/>
      <label for="enable-chat">
        <h2 class="text-md mt-4 font-semibold">Allow Module Chat</h2>
        <p class="text-neutral-400 mt-1">You can temporarily disable chatting with the module during exams or timed
          assignments.</p>
      </label>
    </div>

    <div class="flex items-center mt-4 gap-4">
      <input type="checkbox" class="checkbox checkbox-sm" id="enable-welcome"/>
      <label for="enable-welcome">
        <h2 class="text-md mt-4 font-semibold">Enable Welcome Message</h2>
        <p class="text-neutral-400 mt-1">Set a small welcome message to be sent to students when they use the bot for
          the first time.</p>
      </label>
    </div>

    <!--    <h2 class="text-md mt-4 font-semibold">Welcome Message</h2>-->
    <!--    <input type="text" class="input input-bordered input-sm mt-1 w-1/2 bg-base-200"-->
    <!--           :placeholder="'Welcome to ' + useModuleStore().getCurrentModule.name + '!'"/>-->

    <h1 class="text-2xl mt-8">Appearance</h1>
    <div class="divider mt-1"></div>

    <div class="flex items-center mt-4 gap-4">
      <input type="checkbox" checked="checked" class="checkbox checkbox-sm" id="enable-icon"/>
      <label for="enable-icon">
        <h2 class="text-md mt-4 font-semibold">Use Custom Icon</h2>
        <p class="text-neutral-400 mt-1">You can set a custom image for your module, or just use the default logo.</p>
      </label>
    </div>

    <h2 class="text-md mt-4 font-semibold">Module Icon</h2>
    <div class="flex items-center mt-2 gap-4">
      <img src="../../../assets/bot.webp" alt="Module Avatar"
           class="w-12 h-12 rounded-full border-primary border"/>
      <input type="file" class="file-input file-input-bordered file-input-sm w-full max-w-xs"
             accept="image/png, image/jpeg,"/>
    </div>

    <h1 class="text-2xl mt-8">Advanced</h1>
    <div class="divider mt-1"></div>

    <div class="flex items-center mt-4 gap-4">
      <input type="checkbox" class="checkbox checkbox-sm" id="regenerate-module"/>
      <label for="regenerate-module">
        <h2 class="text-md mt-4 font-semibold">Regenerate Module Data after saving</h2>
        <p class="text-neutral-400 mt-1">This will regenerate the module's knowledge based on your QMPlus page.
          <br/>You will need to enter your Queen Mary username and password to continue.</p>
      </label>
    </div>

    <div class="divider my-8"></div>
    <div class="flex w-full justify-end gap-2 mb-8">
      <button class="btn btn-wide">Undo Changes</button>
      <button class="btn btn-wide">Save Changes</button>
    </div>


  </div>
</template>