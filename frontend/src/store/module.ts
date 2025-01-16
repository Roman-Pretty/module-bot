import {defineStore} from 'pinia';

export interface Module {
    id: string,
    name: string,
    url: string,
    [key: string]: any
}

interface ModuleState {
    currentModule: Module | null,
    modules: Module[]
}

export const useModuleStore = defineStore('modules', {
    state: (): ModuleState => ({
        currentModule: null,
        modules: [],
    }),
    actions: {
        async fetchModules() {
            const response = await fetch('http://127.0.0.1:8000/api/modules/', {
                method: 'GET',
            });
            this.modules = await response.json();
        },
        setCurrentModule(moduleID: string) {
            this.currentModule = this.modules.find((module) => module.id === moduleID) || null;
        },
    },
    getters: {
        getModuleById: (state) => (id: string) => {
            return state.modules.find((module) => module.id === id);
        },
        getModuleByName: (state) => (name: string) => {
            return state.modules.find((module) => module.name === name);
        },
        getModules: (state) => {
            return state.modules;
        },
        getCurrentModule: (state) => {
            return state.currentModule;
        },
        moduleSelected: (state) => {
            return state.currentModule !== null;
        }
    },
});