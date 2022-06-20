import { createRouter, createWebHistory } from "vue-router";

import MainPage from "../views/pages/MainPage";
import CategoryPage from "../views/pages/CategoryPage";
import SettingsPage from "../views/pages/SettingsPage";
import RegistrationPage from "../views/pages/auth/RegistrationPage";
import LoginPage from "../views/pages/auth/LoginPage";

const routes = [
    {
        path: "/",
        name: "main-page",
        component: MainPage,
        meta: {
            layout: "main",
            auth: true,
        },
    },
    {
        path: "/category",
        name: "category-page",
        component: CategoryPage,
        meta: {
            layout: "main",
            auth: true,
        },
    },
    {
        path: "/settings",
        name: "settings-page",
        component: SettingsPage,
        meta: {
            layout: "main",
            auth: true,
        },
    },
    {
        path: "/registration",
        name: "registration-page",
        component: RegistrationPage,
        meta: {
            layout: "auth",
            auth: true,
        },
    },
    {
        path: "/login",
        name: "login-page",
        component: LoginPage,
        meta: {
            layout: "auth",
            auth: false,
        },
    },
];

const router = createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL),
    linkActiveClass: "active",
    linkExactActiveClass: "active",
});

router.beforeEach((to, from, next) => {
    next();
});

export default router;
