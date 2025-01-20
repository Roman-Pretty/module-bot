<script lang="ts">
import {defineComponent} from 'vue';
import {getCSRFToken} from "../../store/auth.ts";

export default defineComponent({
  name: "FinalSubmit",
  props: {
    module_url: String,
    staff_email: String,
    password: String,
    module_name: String,
    module_code: String,
    files: Array as () => File[], // Accept files as a prop
  },
  methods: {
    async submit() {
      this.$emit('setLoading', true); // Set loading to true

      try {
        const formData = new FormData();
        formData.append('url', this.module_url || '');
        formData.append('email', this.staff_email || '');
        formData.append('password', this.password || '');
        formData.append('name', this.module_name || '');
        formData.append('course_id', this.module_code || '');
        this.files?.forEach((file) => formData.append('files', file));

        const response = await fetch('http://localhost:8000/api/generate-module/', {
          method: 'POST',
          credentials: 'include',
          headers: {
            "X-CSRFToken": getCSRFToken(),
          },
          body: formData,
        });

        if (!response.ok) throw new Error("Module submission failed");

      } catch (error) {
        console.error("Error during submission:", error);
      } finally {
        this.$emit('setLoading', false);
        window.location.href = '/';
      }
    },
    previous() {
      this.$emit('previous');
    },
  },
});
</script>

<template>
  <div class="card bg-base-100 w-full max-w-sm shadow-2xl lg:w-[50%] h-2/3 self-center justify-self-end lg:mr-4">
    <div class="card-body h-full">
      <div class="divider text-base-content/50 dark:text-base-content">Submit</div>
      <div>
        <p class="text-base-content/50 text-center text-sm">Please review the details below before submitting</p>
      </div>
      <div class="divider text-base-content/50 dark:text-base-content">Module Information</div>
      <div>
        <p class="text-base-content/50 text-sm">Module Name: {{ module_name }}</p>
        <p class="text-base-content/50 text-sm">Module Code: {{ module_code }}</p>
        <p class="text-base-content/50 text-sm">Module URL: {{ module_url }}</p>
      </div>
      <div class="divider text-base-content/50 dark:text-base-content">QMPlus Login</div>
      <div>
        <p class="text-base-content/50 text-sm">Staff Email: {{ staff_email }}</p>
      </div>
      <div class="divider text-base-content/50 dark:text-base-content">Additional Resources</div>
      <div>
        <p class="text-base-content/50 text-sm">Uploaded Files: {{ files?.length || '0' }}</p>
      </div>

    </div>
    <div class="card-actions w-full justify-center mb-4 flex lg:hidden px-8">
      <button class="btn flex-1" @click="previous">Back</button>
      <button
          class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary text-neutral-50 flex-1 hover:dark:bg-base-100"
          @click="submit">Submit
      </button>
    </div>
  </div>

  <div class="text-center lg:text-left w-1/2 text-white lg:flex hidden flex-col justify-between h-2/3 self-center">
    <div>
      <h1 class="text-5xl font-bold">Ready to Submit?</h1>
      <p class="py-6 ">
        Please look over the provided details and make sure they are correct.
        <br/><br/>
        Once your bot is generated, only you will have access to it. You can add students and other staff members
        from the dashboard after creation.
      </p>
    </div>
    <div class="card-actions justify-center mt-4">
      <button class="btn w-1/3 lg:flex-1" @click="previous">Back</button>
      <button
          class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary hover:dark:bg-base-100 text-neutral-50 w-1/3 lg:flex-1"
          @click="submit">Submit
      </button>
    </div>
  </div>
</template>
