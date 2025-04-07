// src/router/index.js
import { createRouter, createWebHistory } from "vue-router";

// Import các trang

const routes = [


    {
        path: "/",
        component: () => import("@/views/layouts/DefaultLayout.vue"),
        children: [
            {
                path: "", // Trang chính ✅
                name: "home",
                component: () => import('@/views/pages/HomeView.vue'),
            },
            {
                path: "/detail/:id", // ✅ trang chi tiet
                name: "detail",
                component: () => import('@/views/product/productdetail.vue'),
            },
            {
                path: "/categories", // ✅ trang chi tiet
                name: "categories",
                component: () => import('@/views/product/categories.vue'),
            },
            {
                path: "/check", // ✅ trang chi tiet
                name: "check",
                component: () => import('@/views/pages/checkcour.vue'),
            },
            {
                path: "/login", // ✅ trang chi tiet
                name: "login",
                component: () => import('@/views/auth/login.vue'),
            },
            {
                path: "/register", // ✅ trang chi tiet
                name: "register",
                component: () => import('@/views/auth/register.vue'),
            },
            {
                path: "/userdetail", // ✅ trang chi tiet
                name: "userdetail",
                component: () => import('@/views/auth/user/userdetail.vue'),
            },
            {
                path: "/forgot", // ✅ trang chi tiet
                name: "forgot",
                component: () => import('@/views/auth/forgotpass.vue'),
            },
            {
                path: "/reset", // ✅ trang chi tiet
                name: "reset",
                component: () => import('@/views/auth/resetpass.vue'),
            },
            {
                path: "/cart", // ✅ trang chi tiet
                name: "cart",
                component: () => import('@/views/cart/cart.vue'),
            },
            {
                path: "/payment", // ✅ trang chi tiet
                name: "payment",
                component: () => import('@/views/payment/payment.vue'),
            },



        ],

    },
    {
        path: "/paymentsuccess", // ✅ trang chi tiet
        name: "paymentsuccess",
        component: () => import('@/views/payment/successpay.vue'),
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
