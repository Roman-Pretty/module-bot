import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import './index.css'
import App from './App.vue'
import AddModule from "./views/AddModule.vue";
import ChatBot from "./views/ChatBot.vue";
import { createPinia } from 'pinia'
import { useAuthStore } from './store/auth'
import Login from "./views/Login.vue";
import Register from "./views/Register.vue";
import Dashboard from "./views/Dashboard.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: ChatBot,
            name: 'chatbot',
            meta: { requiresAuth: true }
        },
        {
            path: '/addmodule',
            component: AddModule,
            name: 'addmodule',
            meta: { requiresAuth: true }
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
            meta: { requiresAuth: true }
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

router.beforeEach(async function (to, from, next) {
    const authStore = useAuthStore()

    // Log the route change
    console.log(from);

    // Ensure the auth store is initialized (fetch user if needed)
    if (authStore.user === null && authStore.isAuthenticated === false) {
        await authStore.fetchUser()
    }

    // Check if the route requires authentication
    if (to.meta.requiresAuth && !authStore.isAuthenticated) {
        // Redirect to login if not authenticated
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
