<script lang="ts">
import { defineComponent } from 'vue';
import { Pencil, Hash, Link, User, KeyRound } from 'lucide-vue-next';

export default defineComponent({
  name: "ModuleInfoForm",
  components: { Pencil, Hash, Link, User, KeyRound },
  data() {
    return {
      module_url: '',
      staff_email: '',
      password: '',
      module_name: '',
      module_code: '',
    };
  },
  methods: {
    next() {
      this.$emit('next', {
        module_url: this.module_url,
        staff_email: this.staff_email,
        password: this.password,
        module_name: this.module_name,
        module_code: this.module_code,
      });
    },
  },
});
</script>

<template>
  <div>
    <label class="input flex items-center gap-2">
      <Pencil class="opacity-35"/>
      <input type="text" class="grow" placeholder="Module Name" v-model="module_name"/>
    </label>
    <label class="input flex items-center gap-2">
      <Hash class="opacity-35"/>
      <input type="text" class="grow" placeholder="Module Code" v-model="module_code"/>
    </label>
    <label class="input flex items-center gap-2">
      <Link class="opacity-35"/>
      <input type="text" class="grow" placeholder="Module URL" v-model="module_url"/>
    </label>
    <div class="divider my-0"/>
    <label class="input flex items-center gap-2">
      <User class="opacity-35"/>
      <input type="text" class="grow" placeholder="Staff Email" v-model="staff_email"/>
    </label>
    <label class="input flex items-center gap-2">
      <KeyRound class="opacity-35"/>
      <input type="password" class="grow" placeholder="Password" v-model="password"/>
    </label>
  </div>
  <div class="card-actions justify-center mt-4">
    <RouterLink class="btn w-1/3" to="/">Cancel</RouterLink>
    <button class="btn bg-qm text-neutral-50 w-1/3" @click="next">Next</button>
  </div>
</template>
