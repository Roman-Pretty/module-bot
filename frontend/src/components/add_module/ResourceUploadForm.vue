<script lang="ts">
import {defineComponent} from 'vue';

export default defineComponent({
  name: "ResourceUploadForm",
  data() {
    return {
      files: [] as File[],
    };
  },
  methods: {
    handleFileUpload(event: Event) {
      const target = event.target as HTMLInputElement;
      if (target.files) {
        this.files = Array.from(target.files);
        this.$emit('updateFiles', this.files);
      }
    },
    next() {
      this.$emit('next');
    },
    previous() {
      this.$emit('previous');
    },
  },
});
</script>

<template>
  <div class="flex flex-col items-center">
    <h3 class="text-neutral-700 mb-2">Are there any additional resources the bot should be aware of?</h3>
    <p class="text-neutral-500 text-sm">These may include PDFs, lecture slides, or downloaded external resources.</p>
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
    <p class="text-neutral-400 text-xs ">accepted: .pdf, .ppt, .pptx, .doc, .docx</p>
  </div>
  <div class="card-actions justify-center">
    <button class="btn w-1/3" @click="previous">Previous</button>
    <button class="btn bg-qm text-neutral-50 w-1/3" @click="next">Next</button>
  </div>
</template>
