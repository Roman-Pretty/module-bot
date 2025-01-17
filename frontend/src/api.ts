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
        const response = await fetch(`http://localhost:8000/api/chart-data/${useModuleStore()?.getCurrentModule?.id}?timeframe=${timeframe}`);
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