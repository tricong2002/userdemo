// import './assets/css/color.min.css';
import './assets/css/main.css';

import router from "./router"; // Import Vue Router
import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App);
app.use(router); // Kích hoạt Vue Router
app.mount("#app");
