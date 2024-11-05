import { createApp } from 'vue'
import {createRouter, createWebHistory} from "vue-router";
import './index.css'
import App from './App.vue'
import AddModule from "./views/AddModule.vue";
import ChatBot from "./views/ChatBot.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/', component: ChatBot, name: 'chatbot'},
        {path: '/addmodule', component: AddModule, name: 'addmodule'},
    ]
})

createApp(App).use(router).mount('#app')
