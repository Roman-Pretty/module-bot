import {defineStore} from 'pinia'
import {Router} from 'vue-router'
import {useModuleStore} from "./module.ts";
import {url} from "../api";

export interface User {
    username: string,
    id: number,
    email: string,
    is_module_organizer: boolean,

    [key: string]: any
}

interface AuthState {
    user: User | null
    isAuthenticated: boolean
}

export const useAuthStore = defineStore('auth', {
    state: (): AuthState => {
        const storedState = localStorage.getItem('authState')
        return storedState
            ? JSON.parse(storedState)
            : {
                user: null,
                isAuthenticated: false,
            }
    },
    actions: {
        async setCsrfToken(): Promise<void> {
            await fetch(`${url}/api/set-csrf-token`, {
                method: 'GET',
                credentials: 'include',
            })
        },

        async login(username: string, password: string, router: Router | null = null): Promise<void> {
            const response = await fetch(`${url}/api/login-api`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRFToken': getCSRFToken(),
                },
                credentials: 'include',
                body: JSON.stringify({username, password}),
            })
            const data = await response.json()
            if (data.success) {
                this.isAuthenticated = true
                this.user = data.user
                this.saveState()
                if (router) {
                    const redirect = router.currentRoute.value.query.redirect as string || '/'
                    await router.push(redirect)
                }
            } else {
                this.user = null
                this.isAuthenticated = false
                this.saveState()
            }
        },

        async logout(router: Router | null = null): Promise<void> {
            try {
                const response = await fetch(`${url}/api/logout`, {
                    method: 'POST',
                    headers: {
                        'X-CSRFToken': getCSRFToken(),
                    },
                    credentials: 'include',
                })
                if (response.ok) {
                    this.user = null
                    this.isAuthenticated = false
                    const moduleStore = useModuleStore()
                    moduleStore.currentModule = null
                    moduleStore.modules = []
                    this.saveState()
                    if (router) {
                        await router.push({name: 'login'})
                    }
                }
            } catch (error) {
                console.error('Logout failed', error)
                throw error
            }
        },

        async fetchUser(): Promise<void> {
            try {
                const response = await fetch(`${url}/api/user`, {
                    credentials: 'include',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRFToken': getCSRFToken(),
                    },
                })
                if (response.ok) {
                    const data = await response.json()
                    this.user = data
                    this.isAuthenticated = true
                } else {
                    this.user = null
                    this.isAuthenticated = false
                }
            } catch (error) {
                console.error('Failed to fetch user', error)
                this.user = null
                this.isAuthenticated = false
            }
            this.saveState()
        },

        saveState(): void {
            /*
            Save state to local storage to keep it during page reloads.
            */
            localStorage.setItem(
                'authState',
                JSON.stringify({
                    user: this.user,
                    isAuthenticated: this.isAuthenticated,
                })
            )
        },
    },
    getters: {
        getName: (state): string => {
            return state.user ? state.user.name : ''
        },
    },
})

export function getCSRFToken(): string {
    /*
    Retrieve the CSRF token from the cookie for requests requiring CSRF protection.
    */
    const name = 'csrftoken'
    let cookieValue: string | null = null
    if (document.cookie && document.cookie !== '') {
        const cookies = document.cookie.split(';')
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim()
            if (cookie.startsWith(name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1))
                break
            }
        }
    }
    if (cookieValue === null) {
        throw new Error('Missing CSRF cookie.')
    }
    return cookieValue
}
