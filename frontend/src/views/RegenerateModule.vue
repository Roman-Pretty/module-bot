<script lang="ts">
import {defineComponent} from 'vue';
import {regenerateModule} from "../api";
import {useModuleStore} from "../store/module";
import {KeyRound, User} from "lucide-vue-next";
//@ts-ignore
import LoadingScreen from "../components/add_module/LoadingScreen.vue";

export default defineComponent({
  name: "FinalSubmit",
  components: {LoadingScreen, KeyRound, User},
  data() {
    return {
      staff_email: '',
      password: '',
      files: [],
      loading: false,
    };
  },
  methods: {
    handleFileUpload(event: Event) {
      const target = event.target as HTMLInputElement;
      if (target.files) {
        this.files = Array.from(target.files);
      }
    },
    async submit() {
      this.loading = true;
      const moduleStore = useModuleStore();

      try {
        await regenerateModule(this.staff_email, this.password, moduleStore?.currentModule?.id, this.files);
      } catch (error) {
        console.error("Error during submission:", error);
      } finally {
        this.loading = false;
        window.location.href = '/';
      }
    },
  },
});
</script>

<template>
  <div v-if="loading" class="hero bg-[#0a1732] dark:bg-base-300 h-screen w-screen">
    <div class="hero-content text-center w-full">
      <div>
        <LoadingScreen/>
      </div>
    </div>
  </div>
  <div v-else class="bg-[#0a1732] dark:bg-base-300 h-screen lg:grid grid-cols-2 flex items-center justify-center">
    <div class="card bg-base-100 w-full max-w-sm shadow-2xl lg:w-[50%] h-2/3 self-center justify-self-end lg:mr-4">
      <div class="card-body h-full">
        <div class="divider text-base-content/50 dark:text-base-content">QMPlus Login</div>
        <label class="input input-bordered flex items-center gap-2">
          <User class="opacity-35"/>
          <input type="text" class="grow" placeholder="Staff Email" v-model="staff_email"/>
        </label>
        <label class="input input-bordered flex items-center gap-2">
          <KeyRound class="opacity-35"/>
          <input type="password" class="grow" placeholder="Password" v-model="password"/>
        </label>
        <div class="divider text-base-content/50">Additional Resources</div>
      <input
          type="file"
          multiple
          class="file-input w-full max-w-xs my-4"
          @change="handleFileUpload"
          accept="application/pdf,
                  application/vnd.ms-powerpoint,
                  application/vnd.openxmlformats-officedocument.presentationml.presentation,
                  application/msword,
                  application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                  text/plain,
                  "
      />
      <p class="text-base-content/50 text-xs w-full text-center"><span class="font-semibold">Accepted file types:</span> .pdf, .ppt, .pptx, .doc, .docx</p>
      </div>
      <div class="card-actions w-full justify-center mb-4 flex lg:hidden px-8">
        <button class="btn flex-1" @click="this.$router.back()">Back</button>
        <button
            class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary text-neutral-50 flex-1 hover:dark:bg-base-100"
            @click="submit">Regenerate
        </button>
      </div>
    </div>

    <div class="text-center lg:text-left w-1/2 text-white lg:flex hidden flex-col justify-between h-2/3 self-center">
      <div>
        <h1 class="text-5xl font-bold">Regenerate Module</h1>
        <p class="py-6 ">
          Are you sure you want to regenerate your module?
          <br/><br/>
          This will clear your module's knowledge base and regenerate it with the latest data. You will have to
          reupload any additional resources you want the bot to be aware of.
        </p>
      </div>
      <div class="card-actions justify-center mt-4">
        <button class="btn w-1/3 lg:flex-1" @click="this.$router.back();">Back</button>
        <button
            class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary hover:dark:bg-base-100 text-neutral-50 w-1/3 lg:flex-1"
            @click="submit">Regenerate
        </button>
      </div>
    </div>
  </div>
</template>
