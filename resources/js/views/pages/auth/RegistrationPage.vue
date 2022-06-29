<template>
    <h1>RegistrationPage</h1>

    <div class="d-flex flex-column">
        <input v-model="name" type="text" class="form-control mt-5 mb-2" placeholder="name" />
        <input v-model="email" type="text" class="form-control mb-2" placeholder="email" />
        <input v-model="password" type="password" class="form-control mb-2" placeholder="password" />
        <input v-model="password_confirmation" type="password" class="form-control mb-2" placeholder="password_confirmation" />
        <button class="btn btn-primary" @click.prevent="register">register</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        };
    },

    methods: {
        register() {
            axios.get("/sanctum/csrf-cookie").then((response) => {
                axios
                    .post("/register", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                    })
                    .then((res) => {
                        localStorage.setItem("x_xsrf_token", res.config.headers["X-XSRF-TOKEN"]);
                        this.$router.push({ name: "main.page" });
                    });
            });
        },
    },
};
</script>

<style></style>
