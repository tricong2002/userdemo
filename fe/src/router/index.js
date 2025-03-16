// src/router/index.js
import { createRouter, createWebHistory } from "vue-router";

// Import các trang

const routes = [
    {
        path: "/",
        component: () => import("@/views/layouts/DefaultLayout.vue"),
        children: [
            {
                path: "user", // URL đầy đủ: /admin/user
                name: "admin-user",
                component: () => import('@/views/pages/HomeView.vue'),
            }
        ],
    },
    {
        path: "/admin",
        component: () => import("@/views/layouts/AdminLayout.vue"),
        children: [
            {
                path: "user", // URL đầy đủ: /admin/user
                name: "admin-user",
                component: () => import('@/views/pages/HomeView.vue'),
            }
        ],
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
