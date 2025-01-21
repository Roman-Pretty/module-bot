<script lang="ts">
import {defineComponent, ref} from 'vue';
import ModuleInfoForm from "../components/add_module/ModuleInfoForm.vue";
import ResourceUploadForm from "../components/add_module/ResourceUploadForm.vue";
import FinalSubmit from "../components/add_module/FinalSubmit.vue";
import LoadingScreen from "../components/add_module/LoadingScreen.vue";

export default defineComponent({
  name: "AddModule",
  components: {LoadingScreen, ModuleInfoForm, ResourceUploadForm, FinalSubmit},
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

    const files = ref<File[]>([]);

    const handleNext = (data: any) => {
      moduleData.value = {...moduleData.value, ...data};
      nextStep();
    };

    const handleFiles = (selectedFiles: File[]) => {
      files.value = selectedFiles;
    };

    const setLoading = (value: boolean) => {
      loading.value = value;
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
  <div v-if="loading" class="hero bg-[#0a1732] dark:bg-base-300 h-[100dvh] w-screen">
    <div  class="hero-content text-center w-full">
      <div>
        <LoadingScreen/>
      </div>
      </div>
    </div>
  <div v-else class="bg-[#0a1732] dark:bg-base-300 h-[100dvh] lg:grid grid-cols-2 flex items-center justify-center">
    <ModuleInfoForm v-if="step === 1" @next="handleNext"/>
    <ResourceUploadForm v-else-if="step === 2" @updateFiles="handleFiles" @next="nextStep" @previous="previousStep"/>
    <FinalSubmit v-else-if="step === 3" v-bind="{...moduleData, files}" @setLoading="setLoading"
                 @previous="previousStep"/>
    </div>
</template>
