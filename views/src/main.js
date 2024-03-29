import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes";
import "../assets/css/index.css";



const app = createApp(App);

app.use(router).mount("#app");