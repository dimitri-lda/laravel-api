<template>
    <div>
        <h2>API Response:</h2>
        <p v-if="loading">Loading...</p>
        <p v-else-if="error" class="error">{{ error }}</p>
        <pre v-else>{{ data }}</pre>
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

<style scoped>
.error {
    color: red;
}
</style>
