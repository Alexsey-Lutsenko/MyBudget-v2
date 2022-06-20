<template>
    <div class="container-fluid mt-3">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <component :is="layout + '-layout'"></component>
        </div>
    </div>
</template>

<script>
import { useRoute } from "vue-router";
import AuthLayout from "./layouts/AuthLayout.vue";
import MainLayout from "./layouts/MainLayout.vue";

export default {
    name: "App",
    data() {
        return {
            route: useRoute(),
        };
    },

    computed: {
        layout() {
            return this.route.meta.layout;
        },
    },

    components: {
        AuthLayout,
        MainLayout,
    },
};
</script>

<style scoped></style>
