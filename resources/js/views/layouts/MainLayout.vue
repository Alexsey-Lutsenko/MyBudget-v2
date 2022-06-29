<template>
    <div>
        <router-view></router-view>
    </div>
    <div class="mt-auto footer-menu">
        <ul class="navbar-nav flex-row my-2">
            <li class="nav-item">
                <router-link class="nav-link icon-footer-menu" :to="'/'">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-align-justify" />
                    </div>
                    <div>Ввод</div>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link icon-footer-menu" :to="'/graph'">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-chart-line" />
                    </div>
                    <div>Итог</div>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link icon-footer-menu" :to="'/category'">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-apple-whole" />
                    </div>
                    <div>Категории</div>
                </router-link>
            </li>
            <li class="nav-item">
                <button class="btn" @click.prevent="logout">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" />
                    </div>
                    <div>Выход</div>
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    methods: {
        logout() {
            axios.post("/logout").then((res) => {
                localStorage.removeItem("x_xsrf_token");
                this.$router.push({ name: "login.page" });
            });
        },
    },
};
</script>

<style lang="scss" scoped>
.footer-menu {
    position: absolute;
    bottom: 0;
    width: 100%;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
}
.icon-footer-menu {
    margin: 0 10px;
    color: #444444;
    &:focus {
        box-shadow: none;
    }
    &:hover {
        font-weight: 800;
    }
}
.active {
    font-weight: 800;
}
</style>
