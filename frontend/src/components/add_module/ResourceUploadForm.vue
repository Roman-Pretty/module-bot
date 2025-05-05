<script lang="ts">

/**
 * The second card when making a new module, takes pdf files
 * as input to use as additional context.
 */

import {defineComponent} from 'vue';
import {Hash, KeyRound, Link, Pencil, User} from "lucide-vue-next";

export default defineComponent({
  name: "ResourceUploadForm",
  components: {KeyRound, Hash, User, Link, Pencil},
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
  <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl lg:w-[50%] h-2/3 self-center justify-self-end lg:mr-4">
    <div class="card-body h-full">
      <div class="divider text-base-content/50">Additional Resources</div>
      <input
          type="file"
          multiple
          class="file-input w-full max-w-xs my-4"
          @change="handleFileUpload"
          accept="application/pdf"
      />
      <p class="text-base-content/50 text-xs w-full text-center"><span class="font-semibold">Accepted file types:</span> .pdf</p>
    </div>
    <div class="card-actions w-full justify-center mb-4 flex lg:hidden px-8">
      <button class="btn flex-1" @click="previous">Back</button>
      <button
          class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary text-neutral-50 flex-1 hover:dark:bg-base-100"
          @click="next">Next
      </button>
    </div>
  </div>

  <div class="text-center lg:text-left w-1/2 text-white lg:flex hidden flex-col justify-between h-2/3 self-center">
    <div>
      <h1 class="text-5xl font-bold">Additional Resources</h1>
      <p class="py-6 ">
        Are there any additional resources the bot should be aware of?
        <br/><br/>
        These may include PDFs, lecture slides, or downloaded external resources.
      </p>
    </div>
    <div class="card-actions justify-center mt-4">
      <button class="btn w-1/3 lg:flex-1" @click="previous">Back</button>
      <button
          class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary hover:dark:bg-base-100 text-neutral-50 w-1/3 lg:flex-1"
          @click="next">Next
      </button>
    </div>
  </div>
</template>
