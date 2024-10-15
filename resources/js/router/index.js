import { createRouter, createWebHistory } from "vue-router";
import Home from "../pages/Home.vue";
import Register from "../pages/Register.vue";
import Status from "../pages/Status.vue";
import Dashboard from "../pages/admin/Dashboard.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
    },
    {
        path: "/status",
        name: "Status",
        component: Status,
    },

    {
        path: "/admin",
        children: [
            {
                path: "dashboard",
                component: Dashboard,
            },
        ]
    }

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
