<script lang="ts">
import { defineComponent } from 'vue';
import { Hash, User, KeyRound, Link, Pencil } from 'lucide-vue-next';
import LoadingScreen from "../components/LoadingScreen.vue";

export default defineComponent({
  name: "AddModule",
  components: {LoadingScreen, User, KeyRound, Link, Pencil, Hash },
  data() {
    return {
      module_url: '',
      staff_email: '',
      password: '',
      module_name: '',
      module_code: '',
      loading: false
    };
  },
  methods: {
    async generateModule() {
      this.loading = true; // Set loading to true when the request starts
      try {
        await fetch('http://localhost:8000/api/generate-module/', {
          method: 'POST',
          body: JSON.stringify({
            url: this.module_url,
            email: this.staff_email,
            password: this.password,
            name: this.module_name,
            course_id: this.module_code
          })
        });
      } catch (error) {
        console.error('Error generating module:', error);
      } finally {
        this.loading = false; // Set loading to false when the request completes
      }
    }
  }
});
</script>

<template>
  <div class="hero bg-[#0a1732] min-h-screen">
    <div class="hero-content text-center">
      <div class="max-w-md">

        <LoadingScreen v-if="loading" />

        <div v-else class="card bg-base-100 w-96 shadow-xl rounded-none">
          <div class="card-body">
            <h2 class="card-title justify-center">Add Module</h2>
            <label class="input flex items-center gap-2">
              <div class="opacity-35">
                <Pencil />
              </div>
              <input type="text" class="grow" placeholder="Module Name" v-model="module_name" />
            </label>
            <label class="input flex items-center gap-2">
              <div class="opacity-35">
                <Hash />
              </div>
              <input type="text" class="grow" placeholder="Module Code" v-model="module_code" />
            </label>
            <label class="input flex items-center gap-2">
              <div class="opacity-35">
                <Link />
              </div>
              <input type="text" class="grow" placeholder="Module URL" v-model="module_url" />
            </label>
            <div class="divider mt-0 my-0" />
            <label class="input flex items-center gap-2">
              <div class="opacity-35">
                <User />
              </div>
              <input type="text" class="grow" placeholder="Staff Email" v-model="staff_email" />
            </label>
            <label class="input flex items-center gap-2">
              <div class="opacity-35">
                <KeyRound />
              </div>
              <input type="password" class="grow" placeholder="Password" v-model="password" />
            </label>
            <div class="card-actions justify-center">
              <button class="btn bg-qm text-neutral-50" @click="generateModule">Submit</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
