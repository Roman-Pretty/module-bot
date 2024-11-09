<script lang="ts">
import { defineComponent } from 'vue';

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
        // Upload files if any
        if (this.files && this.files.length > 0) {
          const formData = new FormData();
          this.files.forEach((file) => formData.append('files', file));

          const fileUploadResponse = await fetch('http://localhost:8000/api/upload-files/', {
            method: 'POST',
            body: formData,
          });

          if (!fileUploadResponse.ok) throw new Error("File upload failed");
        }

        const response = await fetch('http://localhost:8000/api/generate-module/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            url: this.module_url,
            email: this.staff_email,
            password: this.password,
            name: this.module_name,
            course_id: this.module_code,
          }),
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
  <div class="flex flex-col items-center">
    <p class="text-neutral-700">Ready to submit?</p>
    </div>
  <div>
    <div class="card-actions justify-center mt-4">
      <button class="btn w-1/3" @click="previous">Previous</button>
      <button class="btn bg-qm text-neutral-50 w-1/3" @click="submit">Submit</button>
    </div>
  </div>
</template>
