import {getCSRFToken} from "./store/auth.ts";
import {useModuleStore} from "./store/module.ts";


export async function* askChatbot(question: string) {
    const formData = new FormData();
    formData.append("question", question);
    formData.append("id", `${useModuleStore().currentModule?.id}`);

    const response = await fetch("http://localhost:8000/api/embedding-response/", {
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
            `http://localhost:8000/api/chat-logs/?id=${useModuleStore().currentModule?.id}`,
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
        const response = await fetch(`http://localhost:8000/api/chart-data/${useModuleStore()?.getCurrentModule?.id}?timeframe=${timeframe}`,
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
        const response = await fetch(`http://localhost:8000/api/chat-summary/${useModuleStore()?.getCurrentModule?.id}?timeframe=${timeframe}`,
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
        const response = await fetch(`http://localhost:8000/api/download-chat-logs/${useModuleStore()?.getCurrentModule?.id}`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to download chat logs');
        }
        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'chat-logs.csv';
        a.click();
    } catch (error) {
        console.error('Error downloading chat logs:', error);
    }
}

export async function fetchModuleMembers() {
    try {
        const response = await fetch(`http://localhost:8000/api/module-members/${useModuleStore()?.getCurrentModule?.id}`,
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
        const response = await fetch(`http://localhost:8000/api/module-settings/${useModuleStore()?.getCurrentModule?.id}`,
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
        const response = await fetch(`http://localhost:8000/api/module-settings/${useModuleStore()?.getCurrentModule?.id}/`,
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
        const response = await fetch(`http://localhost:8000/api/user-summary/`,
            {method: "GET", credentials: "include"});
        if (!response.ok) {
            throw new Error('Failed to fetch user summary');
        }
        return await response.json();
    } catch (error) {
        console.error('Error fetching user summary:', error);
    }
}