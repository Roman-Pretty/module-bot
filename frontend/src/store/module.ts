/**
 * A pinia store for storing module information on the client.
 *
 * Stores the modules a user is currently enrolled in, as well as
 * the modules they currently organise. It also holds their settings.
 *
 * Originally, this store held every user in a module, but that
 * was inefficient and allowed malicious users to find out others ids.
 */

import {defineStore} from 'pinia';
import {url} from "../api";

export interface Module {
    id: string,
    name: string,
    url: string,
    enable_welcome_message: boolean,
    welcome_message: string,

    [key: string]: any
}

interface ModuleState {
    currentModule: Module | null,
    modules: Module[] | null
    organizedModules: Module[] | null
}

export const useModuleStore = defineStore('modules', {
    state: (): ModuleState => ({
        currentModule: null,
        modules: null,
        organizedModules: null,
    }),
    actions: {
        async fetchModules() {
            const response = await fetch(`${url}/api/modules`, {
                method: 'GET', credentials: 'include',
            });
            this.modules = await response.json() ?? [];
        },
        async fetchOrganizedModules() {
            const response = await fetch(`${url}/api/organized-modules`, {
                method: 'GET', credentials: 'include',
            });
            this.organizedModules = await response.json() ?? [];
            if (!this.organizedModules || !this.organizedModules.some(module => module.id === this.getCurrentModule?.id)) {
                this.setCurrentModule("");
            }
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
            return state.organizedModules;
        },
        getCurrentModule: (state) => {
            return state.currentModule;
        },
        moduleSelected: (state) => {
            return state.currentModule !== null;
        }
    },
});