import { ref } from "vue";

export function useApi(baseApiUrl: string) {
    const inputId = ref("");
    const data = ref<null | any>(null);
    const loading = ref(false);
    const error = ref<string | null>(null);

    const sendRequest = async () => {
        loading.value = true;
        error.value = null;
        data.value = null;

        try {
            const url = `${baseApiUrl}?text=${encodeURIComponent(inputId.value)}`;
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`HTTP Error: ${response.status}`);
            }
            data.value = await response.json();
        } catch (err) {
            error.value = (err as Error).message;
        } finally {
            loading.value = false;
        }
    };

    return {
        inputId,
        data,
        loading,
        error,
        sendRequest,
    };
}
