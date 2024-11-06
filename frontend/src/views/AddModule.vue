<script lang="ts">
import { defineComponent, ref } from 'vue';
import ModuleInfoForm from "../components/add_module/ModuleInfoForm.vue";
import ResourceUploadForm from "../components/add_module/ResourceUploadForm.vue";
import FinalSubmit from "../components/add_module/FinalSubmit.vue";
import LoadingScreen from "../components/add_module/LoadingScreen.vue";

export default defineComponent({
  name: "AddModule",
  components: { LoadingScreen, ModuleInfoForm, ResourceUploadForm, FinalSubmit },
  setup() {
    const step = ref(1);
    const loading = ref(false);

    const moduleData = ref({
      module_url: '',
      staff_email: '',
      password: '',
      module_name: '',
      module_code: '',
    });

    const files = ref<File[]>([]); // Store files here

    const handleNext = (data: any) => {
      moduleData.value = { ...moduleData.value, ...data };
      nextStep();
    };

    const handleFiles = (selectedFiles: File[]) => {
      files.value = selectedFiles; // Capture files from ResourceUploadForm
    };

    const setLoading = (value: boolean) => {
      loading.value = value; // Update loading state
    };

    const nextStep = () => {
      if (step.value < 3) step.value++;
    };

    const previousStep = () => {
      if (step.value > 1) step.value--;
    };

    return {
      step,
      loading,
      moduleData,
      files,
      handleNext,
      handleFiles,
      setLoading,
      nextStep,
      previousStep,
    };
  },
});
</script>

<template>
  <div class="hero bg-[#0a1732] min-h-screen">
    <div class="hero-content text-center">
      <div v-if="loading">
        <LoadingScreen/>
      </div>

      <div v-else class="card bg-base-100 w-[30vw] shadow-xl rounded-none h-[60vh] ">
        <div class="card-body h-full justify-between">
          <div>
            <h2 class="card-title justify-center">Add Module</h2>
            <div class="divider my-0"/>
          </div>
          <ModuleInfoForm v-if="step === 1" @next="handleNext"/>
          <ResourceUploadForm v-else-if="step === 2" @updateFiles="handleFiles" @next="nextStep" @previous="previousStep"/>
          <FinalSubmit v-else-if="step === 3" v-bind="{...moduleData, files}" @setLoading="setLoading" @previous="previousStep"/>
        </div>
      </div>
    </div>
  </div>
</template>
