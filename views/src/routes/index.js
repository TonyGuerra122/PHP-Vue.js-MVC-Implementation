import { createRouter, createWebHistory } from "vue-router";

import Home from "../pages/Home.vue";
import About from "../pages/About.vue";
import Login from "../pages/Login.vue";

const routes = [
  { path: "/", component: Home },
  { path: "/about", component: About },
  { path: "/auth/login", component: Login }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;