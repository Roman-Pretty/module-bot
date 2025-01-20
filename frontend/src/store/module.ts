import {defineStore} from 'pinia';
import {useAuthStore} from "./auth.ts";
import {url} from "../api";

export interface Module {
    id: string,
    name: string,
    url: string,
    members: {member_id: number, role: string}[],
    enable_welcome_message: boolean,
    welcome_message: string,

    [key: string]: any
}

interface ModuleState {
    currentModule: Module | null,
    modules: Module[] | null
}

export const useModuleStore = defineStore('modules', {
    state: (): ModuleState => ({
        currentModule: null,
        modules: null,
    }),
    actions: {
        async fetchModules() {
            const response = await fetch(`${url}/api/modules`, {
                method: 'GET', credentials: 'include',
            });
            this.modules = await response.json();
        },
        setCurrentModule(moduleID: string) {
            this.currentModule = this.modules?.find((module) => module.id === moduleID) || null;
        },
    },
    getters: {
        getModuleById: (state) => (id: string) => {
            return state.modules?.find((module) => module.id === id);
        },
        getModuleByName: (state) => (name: string) => {
            return state.modules?.find((module) => module.name === name);
        },
        getModules: (state) => {
            return state.modules;
        },
        getOrganizedModules: (state) => {
            // Workaround for typescript
            if (!useAuthStore()?.user) return [];
            else {
                const user = useAuthStore()?.user || {id: -1};
                return state.modules?.filter((module: Module) =>
                    module.members.some((member) => member.member_id === user.id && member.role === 'Organizer')
                );
            }
        },
        getCurrentModule: (state) => {
            return state.currentModule;
        },
        moduleSelected: (state) => {
            return state.currentModule !== null;
        }
    },
});