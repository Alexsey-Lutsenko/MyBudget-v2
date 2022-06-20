<template>
    <div>
        <router-view></router-view>
    </div>
    <div class="mt-auto footer-menu">
        <hr class="m-0" />
        <ul class="navbar-nav flex-row footer-menu-position my-2">
            <li class="nav-item">
                <router-link class="nav-link icon-footer-menu" :to="'/'">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-align-justify" />
                    </div>
                    <div>Ввод</div>
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
                <router-link class="nav-link icon-footer-menu" :to="'/settings'">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-gear" />
                    </div>
                    <div>Настройки</div>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link icon-footer-menu" :to="'/login'">
                    <div class="d-flex justify-content-center">
                        <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" />
                    </div>
                    <div>Выход</div>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.footer-menu {
    position: absolute;
    bottom: 0;
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
