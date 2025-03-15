<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">API Response for /api/example:</h2>
            <p v-if="loading" class="text-gray-500">Loading...</p>
            <p v-else-if="error" class="text-red-500">{{ error }}</p>
            <pre
                v-else
                class="bg-gray-200 p-4 rounded-md text-left text-sm text-gray-800 overflow-auto"
            >{{ data }}</pre>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const apiUrl = import.meta.env.VITE_API_URL || "http://127.0.0.1:8000/api/example";
const data = ref(null);
const loading = ref(true);
const error = ref(null);

const fetchData = async () => {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`HTTP Error: ${response.status}`);
        }
        data.value = await response.json();
    } catch (err) {
        error.value = err.message;
    } finally {
        loading.value = false;
    }
};

onMounted(fetchData);
</script>
