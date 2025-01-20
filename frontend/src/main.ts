import {createApp} from 'vue'
import {createRouter, createWebHistory} from "vue-router";
import './index.css'
import App from './App.vue'
import AddModule from "./views/AddModule.vue";
import ChatBot from "./views/ChatBot.vue";
import {createPinia} from 'pinia'
import {useAuthStore} from './store/auth.ts'
import Login from "./views/Login.vue";
import Register from "./views/Register.vue";
import Dashboard from "./views/Dashboard.vue";
import Profile from "./views/Profile.vue";
import RegenerateModule from "./views/RegenerateModule.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: ChatBot,
            name: 'chatbot',
            meta: {requiresAuth: true}
        },
        {
            path: '/addmodule',
            component: AddModule,
            name: 'addmodule',
            meta: {requiresAuth: true}
        },
        {
            path: '/regeneratemodule',
            component: RegenerateModule,
            name: 'regeneratemodule',
            meta: {requiresAuth: true}
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
            meta: {requiresAuth: true}
        },
        {
            path: '/profile',
            component: Profile,
            name: 'profile',
            meta: {requiresAuth: true}
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        }
    ]
})

//@ts-ignore
router.beforeEach(async function (to, from, next) {
    const authStore = useAuthStore()

    // Check if the route requires authentication
    if (to.meta.requiresAuth && !authStore.isAuthenticated) {
        // Redirect to login if not authenticated
        useAuthStore().logout()
        next({name: 'login', query: {redirect: to.fullPath}})
    } else {
        next()
    }
})

const app = createApp(App)

app.use(createPinia())
app.use(router)

const authStore = useAuthStore()
authStore.setCsrfToken()

app.mount('#app')
