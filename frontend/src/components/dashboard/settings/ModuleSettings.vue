<script lang="ts">
/**
 * The settings for the module, this is basically
 * just a list of form components that update the module when
 * save is pressed, which calls the api.
 */
import {defineComponent, ref, onMounted, watch} from 'vue';
import {useModuleStore} from '../../../store/module';
import {fetchModuleSettings, updateModuleSettings} from '../../../api';
import {ExternalLink} from 'lucide-vue-next';

export default defineComponent({
  name: "ModuleSettings",
  components: {ExternalLink},
  setup() {
    const moduleName = ref('');
    const allowModuleChat = ref(true);
    const enableWelcomeMessage = ref(false);
    const welcomeMessage = ref('');
    const isLoading = ref(true);

    const moduleStore = useModuleStore();

    watch(() => moduleStore.getCurrentModule, () => {
      loadModuleSettings();
    });

    const loadModuleSettings = async () => {
      isLoading.value = true;
      try {
        const settings = await fetchModuleSettings();
        if (settings) {
          moduleName.value = settings.name || '';
          allowModuleChat.value = settings.enabled ?? true;
          enableWelcomeMessage.value = settings.enable_welcome_message ?? false;
          welcomeMessage.value = settings.welcome_message || '';
        }
      } catch (error) {
        console.error('Error loading module settings:', error);
      } finally {
        isLoading.value = false;
      }
    };

    const saveChanges = async () => {
      await updateModuleSettings({
        name: moduleName.value,
        enabled: allowModuleChat.value ? 'True' : 'False',
        enable_welcome_message: enableWelcomeMessage.value ? 'True' : 'False',
        welcome_message: welcomeMessage.value,
      });
      loadModuleSettings()
    };

    const undoChanges = () => {
      loadModuleSettings();
    };

    onMounted(() => {
      loadModuleSettings();
    });

    return {
      moduleName,
      allowModuleChat,
      enableWelcomeMessage,
      welcomeMessage,
      isLoading,
      saveChanges,
      undoChanges,
      moduleStore: useModuleStore(),
    };
  },
});
</script>

<template>
  <div v-if="isLoading" class="flex justify-center items-center h-full">
    <div class="text-center">
      <span class="loading loading-spinner loading-lg"></span>
      <p class="mt-2">Loading settings...</p>
    </div>
  </div>
  <form
      v-else
      class="h-full w-full overflow-y-auto xl:px-[20%] lg:px-[14%] px-4"
      @submit.prevent="saveChanges"
  >
    <h1 class="text-2xl mt-8">General</h1>
    <div class="divider mt-1"></div>

    <h2 class="text-md mt-4 font-semibold">Module Name</h2>
    <input
        type="text"
        class="input input-bordered bg-base-200 md:input-sm mt-1 md:w-1/3 w-full"
        placeholder="Module Name"
        v-model="moduleName"
    />

    <div class="flex items-center mt-4 gap-4">
      <input
          type="checkbox"
          class="checkbox checkbox-sm"
          v-model="allowModuleChat"
          id="enable-chat"
      />
      <label for="enable-chat">
        <h2 class="text-md mt-4 font-semibold">Allow Module Chat</h2>
        <p class="text-base-content/50 mt-1">
          You can temporarily disable chatting with the module during exams or
          timed assignments.
        </p>
      </label>
    </div>

    <div class="flex items-center mt-4 gap-4">
      <input
          type="checkbox"
          class="checkbox checkbox-sm"
          v-model="enableWelcomeMessage"
          id="enable-welcome"
      />
      <label for="enable-welcome">
        <h2 class="text-md mt-4 font-semibold">Enable Welcome Message</h2>
        <p class="text-base-content/50 mt-1">
          Set a small welcome message to be sent to students when they use the
          bot for the first time.
        </p>
      </label>
    </div>

    <div v-if="enableWelcomeMessage">
      <h2 class="text-md mt-4 font-semibold">Welcome Message</h2>
      <input
          type="text"
          class="input input-bordered md:input-sm mt-1 md:w-1/2 w-full bg-base-200"
          :placeholder="'Welcome to ' + moduleStore?.getCurrentModule?.name + '!'"
          v-model="welcomeMessage"
      />
    </div>

    <h1 class="text-2xl mt-8">Advanced</h1>
    <div class="divider mt-1"></div>

    <div class="flex sm:flex-row-reverse flex-col-reverse sm:items-end mt-4 gap-4">
      <RouterLink to="/regeneratemodule" class="btn sm:btn-wide">
        Regenerate Module
        <ExternalLink :size="18"/>
      </RouterLink>
      <label for="regenerate-module">
        <h2 class="text-md mt-4 font-semibold">
          Regenerate Module
        </h2>
        <p class="text-base-content/50 mt-1">
          This will completely regenerate the module's knowledge based on your QMPlus
          page. This is useful if you have made changes to your QMPlus page and want
          the bot to reflect those changes.<br/>
          You will need to enter your Queen Mary username and password to
          continue.
        </p>
      </label>
    </div>

    <div class="divider my-8"></div>
    <div class="flex w-full justify-end gap-2 mb-8">
      <button type="button" class="btn sm:btn-wide" @click="undoChanges">
        Cancel Changes
      </button>
      <button type="submit" class="btn sm:btn-wide mb-20">
        Save Changes
      </button>
    </div>
  </form>
</template>
