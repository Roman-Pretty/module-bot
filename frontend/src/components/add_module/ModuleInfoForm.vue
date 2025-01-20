<script lang="ts">
import {defineComponent} from 'vue';
import {Pencil, Hash, Link, User, KeyRound} from 'lucide-vue-next';

export default defineComponent({
  name: "ModuleInfoForm",
  components: {Pencil, Hash, Link, User, KeyRound},
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
    <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl lg:w-[50%] h-2/3 self-center justify-self-end lg:mr-4">
      <div class="card-body">
        <div class="divider text-base-content/50">Module Information</div>
        <label class="input input-bordered flex items-center gap-2">
          <Pencil class="opacity-35"/>
          <input type="text" class="grow" placeholder="Module Name" v-model="module_name"/>
        </label>
        <label class="input input-bordered flex items-center gap-2">
          <Hash class="opacity-35"/>
          <input type="text" class="grow" placeholder="Module Code" v-model="module_code"/>
        </label>
        <label class="input input-bordered flex items-center gap-2">
          <Link class="opacity-35"/>
          <input type="text" class="grow" placeholder="Module URL" v-model="module_url"/>
        </label>
        <div class="divider text-base-content/50">QMPlus Login</div>
        <label class="input input-bordered flex items-center gap-2">
          <User class="opacity-35"/>
          <input type="text" class="grow" placeholder="Staff Email" v-model="staff_email"/>
        </label>
        <label class="input input-bordered flex items-center gap-2">
          <KeyRound class="opacity-35"/>
          <input type="password" class="grow" placeholder="Password" v-model="password"/>
        </label>
      </div>
      <div class="card-actions w-full justify-center mb-4 flex lg:hidden px-8">
        <RouterLink class="btn flex-1" to="/">Cancel</RouterLink>
        <button class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary text-neutral-50 flex-1 hover:dark:bg-base-100" @click="next">Next</button>
      </div>
    </div>

     <div class="text-center lg:text-left w-1/2 text-white lg:flex hidden flex-col justify-between h-2/3 self-center">
       <div>
        <h1 class="text-5xl font-bold">Module Information</h1>
        <p class="py-6 ">
          Please provide some basic information and the QMPlus link to the module.
          <br/><br/>
          You will also need to provide your QMPlus login details. These are not saved and are used to login once
          when generating the module bot.
        </p>
         </div>
      <div class="card-actions justify-center mt-4">
        <RouterLink class="btn w-1/3 lg:flex-1" to="/">Cancel</RouterLink>
        <button class="btn bg-primary dark:bg-base-200 border-none hover:bg-secondary hover:dark:bg-base-100 text-neutral-50 w-1/3 lg:flex-1" @click="next">Next</button>
      </div>
    </div>
</template>
