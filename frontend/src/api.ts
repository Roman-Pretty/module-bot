import {getCSRFToken} from "./store/auth.ts";
import {useModuleStore} from "./store/module.ts";

/**
 * This file contains functions to interact with the backend API.
 *
 * It was easier to create a separate file for the API functions as
 * they take up a lot of space with boilerplate, and it allows me to
 * keep the components themselves cleaner and more focused on their
 * specific tasks.
 *
 * There are only really two types of functions here:
 *
 * 1. Functions that get data from the backend:
 *    these are the simplest to implement and are just GET requests
 *
 * 2. Functions that edit data on the backend:
 *    these are a bit more complex as they require a CSRF token to
 *    authenticate the request, and take more arguments to specify what
 *    they are doing.
 */

// When running in frontend development mode, the backend is running on
// a different port, so we need to specify the URL of the backend API.
export let url = "";
if (import.meta.env.VITE_DEV_MODE === "true" || import.meta.env.VITE_DEV_MODE === "True") {
    url = "http://localhost:8000";
}

/**
 * Asks the chatbot a question and streams the response back.
 * @param question The question to ask the chatbot.
 */
export async function* askChatbot(question: string) {
    const formData = new FormData();
    formData.append("question", question);
    formData.append("id", `${useModuleStore().currentModule?.id}`);

    const response = await fetch(`${url}/api/embedding-response/`, {
        method: 'POST',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            "X-CSRFToken": getCSRFToken(),
        },
        body: new URLSearchParams(formData as any),
    });

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }

    const reader = response.body?.getReader();
    const decoder = new TextDecoder();

    try {
        while (true) {
            //@ts-ignore
            const {done, value} = await reader?.read();
            if (done) break;

            const messageChunk = decoder.decode(value, {stream: true});
            yield messageChunk;
        }
    } finally {
        reader?.releaseLock();
    }
}

/**
 *  Fetches the logs for the currently logged in user and
 *  currently selected module from the backend. Returns them
 *  as a tuple of [id, message, bot_message]. Where bot message indicates
 *  whether it was a message to or from the bot.
 */
export async function fetchChatLogs(): Promise<[]> {
    try {
        const response = await fetch(
            `${url}/api/chat-logs/?id=${useModuleStore().currentModule?.id}`,
            {method: "GET", credentials: "include"}
        );
        if (!response.ok) {
            throw new Error("Failed to fetch chat logs");
        }
        const data = await response.json();
        return data.map((msg: any, index: number) => ({
            id: index + 1,
            message: msg.message,
            bot_message: msg.bot_message,
        }));

    } catch (error) {
        console.error("Error:", error);
    }
    return [];
}

/**
 * Fetches the chart data for a module, and returns it as a
 * Chart.js compatible dataset.
 *
 * @param timeframe Must match with the backend views three options
 * for day, 3 days, week or month!
 */
export async function fetchChartData(timeframe: string) {
    try {
        const response = await fetch(`${url}/api/chart-data/${useModuleStore()?.getCurrentModule?.id}?timeframe=${timeframe}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to fetch chart data');
        }
        const data = await response.json();

        // Create a new chartData object to trigger reactivity
        const chartData = {
            labels: data.labels,
            datasets: [
                {
                    label: 'Questions Asked',
                    data: data.values,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                },
            ],
        };
        return chartData;
    } catch (error) {
        console.error('Error fetching chart data:', error);
    }
}

/**
 * Fetches the chat summary for a module, which is basically
 * just the text version of the above method.
 *
 * @param timeframe Must match with the backend views three options
 * for day, 3 days, week or month!
 */
export async function fetchChatSummary(timeframe: string) {
    try {
        const response = await fetch(`${url}/api/chat-summary/${useModuleStore()?.getCurrentModule?.id}?timeframe=${timeframe}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to fetch chat summary');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching chat summary:', error);
    }
}

/**
 * Downloads the chat logs for a module, this is a button on the dashboard
 * and was used to plot the graph showing correlations between module
 * interactions and deadlines in the report.
 */
export async function downloadChatLogs() {
    try {
        const response = await fetch(`${url}/api/download-chat-logs/${useModuleStore()?.getCurrentModule?.id}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to download chat logs');
        }
        const blob = await response.blob();
        // Quite a hacky way to download a file, (making an anchor tag with
        // a custom url and clicking it) but it works as I only intend
        // to use it once.
        const surl = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = surl;
        a.download = 'chat-logs.csv';
        a.click();
    } catch (error) {
        console.error('Error downloading chat logs:', error);
    }
}

/**
 * Fetches the members for the current module, used in the dashboard
 * to see who is enrolled.
 */
export async function fetchModuleMembers() {
    try {
        const response = await fetch(`${url}/api/module-members/${useModuleStore()?.getCurrentModule?.id}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to fetch module organizers');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching module organizers:', error);
    }
}

/**
 * Fetches the current settings for a current module, used in the dashboard
 * when opening the settings tab (to see what the current settings are).
 */
export async function fetchModuleSettings() {
    try {
        const response = await fetch(`${url}/api/module-settings/${useModuleStore()?.getCurrentModule?.id}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to fetch module settings');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching module settings:', error);
    }
}

/**
 * Same as above but updates the values.
 * @param settings The settings to update, as a dictionary.
 */
export async function updateModuleSettings(settings: any) {
    try {
        const formData = new FormData();
        for (const key in settings) {
            formData.append(key, settings[key]);
        }
        const response = await fetch(`${url}/api/module-settings/${useModuleStore()?.getCurrentModule?.id}/`,
            {
                method: "PUT",
                credentials: "include",
                headers: {
                    "X-CSRFToken": getCSRFToken(),
                },
                body: formData,
            });
        if (!response.ok) {
            throw new Error('Failed to update module settings');
        }
        useModuleStore().fetchModules();
        useModuleStore().fetchOrganizedModules();
    } catch (error) {
        console.error('Error updating module settings:', error);
    }
}

/**
 * Simply fetches the summary for the current user for the profile
 * page.
 */
export async function fetchUserSummary() {
    try {
        const response = await fetch(`${url}/api/user-summary/`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to fetch user summary');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching user summary:', error);
    }
}

/**
 * The inverse of the fetch module members function, this fetches a
 * page of users that are not enrolled, used when adding a user.
 *
 * In future, it could be better to simply return all users
 * and show visually which users are already added.
 *
 * @param page The page (starting at 1)
 * @param searchQuery The search query to filter users by name.
 */
export async function fetchAllUsersOutOfModule(page: number, searchQuery: string) {
    try {
        const moduleId = useModuleStore()?.getCurrentModule?.id;
        if (!moduleId) {
            throw new Error("Module ID is missing or undefined");
        }

        const surl = url
            ? new URL(`/api/all-users/${moduleId}/`, url).toString()
            : `/api/all-users/${moduleId}/`;

        const params = new URLSearchParams();
        params.set('page', String(page));
        if (searchQuery) {
            params.set('search', searchQuery);
        }

        const response = await fetch(`${surl}?${params.toString()}`, {
            method: "GET",
            credentials: "include",
        });

        if (!response.ok) {
            throw new Error(`Failed to fetch all users: ${response.statusText}`);
        }
        return await response.json();
    } catch (error) {
        console.error("Error fetching all users:", error);
    }
}


/**
 * Adds a member to the module by calling the appropriate backend view.
 * Just creates a new module membership.
 *
 * @param userId The ID of the user to add.
 * @param role Their role, Student, Module Organizer or Demonstrator.
 */
export async function addMemberToModule(userId: number, role: string) {
    try {
        const formData = new FormData();
        formData.append("user_id", String(userId));
        formData.append("role", role);

        const response = await fetch(`${url}/api/add-member/${useModuleStore()?.getCurrentModule?.id}/`, {
            method: "POST",
            credentials: "include",
            headers: {
                "X-CSRFToken": getCSRFToken(),
            },
            body: formData,
        });

        if (!response.ok) {
            throw new Error("Failed to add member to module");
        }
    } catch (error) {
        console.error("Error adding member to module:", error);
    }
}

/**
 * Updates the role of a member in the module.
 *
 * @param userId The ID of the user to update.
 * @param role The new role for the user.
 */
export async function updateUserRole(userId: number, role: string) {
    try {
        const requestBody = {
            user_id: userId,
            role: role
        };

        const response = await fetch(`${url}/api/update-member/${useModuleStore()?.getCurrentModule?.id}/`, {
            method: "PUT",
            credentials: "include",
            headers: {
                "Content-Type": "application/json",
                "X-CSRFToken": getCSRFToken(),
            },
            body: JSON.stringify(requestBody),
        });

        if (!response.ok) {
            throw new Error("Failed to update member role");
        }
    } catch (error) {
        console.error("Error updating member role:", error);
    }
}

/**
 * Removes a member from the module by simply deleting the respective
 * module membership.
 *
 * @param userId The ID of the user to remove.
 */
export async function removeMemberFromModule(userId: number) {
    try {
        const response = await fetch(`${url}/api/remove-member/${useModuleStore()?.getCurrentModule?.id}/${userId}/`, {
            method: "DELETE",
            credentials: "include",
            headers: {
                "X-CSRFToken": getCSRFToken(),
            },
        });

        if (!response.ok) {
            throw new Error("Failed to remove member from module");
        }
    } catch (error) {
        console.error("Error removing member from module:", error);
    }
}

/**
 * Regenerates the module, passing the new information.
 *
 * @param staff_email The email of the staff member.
 * @param password The password of the staff member.
 * @param module_id The ID of the module to regenerate.
 * @param files The files to upload.
 */
export async function regenerateModule(staff_email: string, password: string, module_id: string, files: File[]) {
    try {
        const formData = new FormData();
        formData.append('email', staff_email || '');
        formData.append('password', password || '');
        formData.append('module_id', module_id || '');
        files?.forEach((file) => formData.append('files', file));

        const response = await fetch(`${url}/api/regenerate-module/`, {
            method: 'POST',
            credentials: 'include',
            headers: {
                'X-CSRFToken': getCSRFToken(),
            },
            body: formData,
        });
        if (!response.ok) {
            throw new Error('Failed to regenerate module');
        }
    } catch (error) {
        console.error("Error regenerating module:", error);
    }
}

