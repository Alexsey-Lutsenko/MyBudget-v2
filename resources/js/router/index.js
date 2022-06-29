import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "main.page",
        component: () => import("../views/pages/MainPage"),
        meta: {
            layout: "main",
            auth: true,
        },
    },
    {
        path: "/category",
        name: "category.page",
        component: () => import("../views/pages/CategoryPage"),
        meta: {
            layout: "main",
            auth: true,
        },
    },
    {
        path: "/graph",
        name: "graph.page",
        component: () => import("../views/pages/GraphPage"),
        meta: {
            layout: "main",
            auth: true,
        },
    },
    {
        path: "/registration",
        name: "registration.page",
        component: () => import("../views/pages/auth/RegistrationPage"),
        meta: {
            layout: "auth",
            auth: false,
        },
    },
    {
        path: "/login",
        name: "login.page",
        component: () => import("../views/pages/auth/LoginPage"),
        meta: {
            layout: "auth",
            auth: false,
        },
    },
    ,
    {
        path: "/:notFound(.*)",
        name: "404.page",
        component: () => import("../views/pages/NotFoundPage"),
        meta: {
            layout: "main",
            auth: true,
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
    const token = localStorage.getItem("x_xsrf_token");

    if (!token) {
        if (to.meta.auth) {
            return next({ name: "login.page" });
        } else {
            return next();
        }
    }

    if (token) {
        if (to.meta.auth) {
            return next();
        } else {
            return next({ name: "main.page" });
        }
    }

    next();
});

export default router;
