import { createRouter, createWebHistory } from "vue-router";

import MainPage from "../views/pages/MainPage";
import RegistrationPage from "../views/pages/auth/RegistrationPage";

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
        path: "/registration",
        name: "registration-page",
        component: RegistrationPage,
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
