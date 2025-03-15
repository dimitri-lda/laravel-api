import './bootstrap';
import { createApp } from "vue";
import ShowApi from "./ShowApi.vue";
import '../css/style.css';

const app = createApp(ShowApi);
app.mount("#app");
