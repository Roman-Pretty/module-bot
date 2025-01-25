import {getCSRFToken} from "./store/auth.ts";
import {useModuleStore} from "./store/module.ts";

export let url = "";
if (import.meta.env.VITE_DEV_MODE === "true" || import.meta.env.VITE_DEV_MODE === "True") {
    url = "http://localhost:8000";
}

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

export async function downloadChatLogs() {
    try {
        const response = await fetch(`${url}/api/download-chat-logs/${useModuleStore()?.getCurrentModule?.id}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to download chat logs');
        }
        const blob = await response.blob();
        const surl = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = surl;
        a.download = 'chat-logs.csv';
        a.click();
    } catch (error) {
        console.error('Error downloading chat logs:', error);
    }
}

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
    } catch (error) {
        console.error('Error updating module settings:', error);
    }
}

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

