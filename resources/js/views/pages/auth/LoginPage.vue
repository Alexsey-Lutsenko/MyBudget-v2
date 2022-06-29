<template>
    <h1>Login page</h1>
    <div class="d-flex flex-column">
        <input v-model="email" type="text" class="form-control mt-5 mb-2" />
        <input v-model="password" type="password" class="form-control mb-2" />
        <button class="btn btn-primary" @click.prevent="login">login</button>
    </div>

    <router-link class="nav-link" :to="'/registration'">register</router-link>
</template>

<script>
export default {
    data() {
        return {
            email: null,
            password: null,
        };
    },

    methods: {
        login() {
            axios.get("/sanctum/csrf-cookie").then((response) => {
                axios
                    .post("/login", { email: this.email, password: this.password })
                    .then((res) => {
                        localStorage.setItem("x_xsrf_token", res.config.headers["X-XSRF-TOKEN"]);
                        this.$router.push({ name: "main.page" });
                    })
                    .catch((err) => {
                        console.log(err.response);
                    });
            });
        },
    },
};
</script>

<style></style>
