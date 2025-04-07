// import './assets/css/color.min.css';
import '@/assets/css/index.css';
import '@/assets/css/bootstrap.min.css';

import router from "./router"; // Import Vue Router
import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp(App);
app.use(router); // Kích hoạt Vue Router
app.use(pinia); // kich hoat pinia
app.mount("#app");
