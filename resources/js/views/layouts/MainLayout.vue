<template>
    <div>
        <router-view></router-view>
    </div>
    <div class="mt-auto footer-menu">
        <button class="btn btn-footer-menu">
            <div class="d-flex justify-content-center">
                <font-awesome-icon icon="fa-solid fa-align-justify" />
            </div>
            <div>Ввод</div>
        </button>
        <button class="btn btn-footer-menu">
            <div class="d-flex justify-content-center">
                <font-awesome-icon icon="fa-solid fa-apple-whole" />
            </div>
            <div>Категории</div>
        </button>
        <button class="btn btn-footer-menu">
            <div class="d-flex justify-content-center">
                <font-awesome-icon icon="fa-solid fa-gear" />
            </div>
            <div>Настройки</div>
        </button>
        <button class="btn btn-footer-menu">
            <div class="d-flex justify-content-center">
                <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" />
            </div>
            <div>Выход</div>
        </button>
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
.btn-footer-menu {
    min-width: 80px;
    &:focus {
        box-shadow: none;
    }
    &:hover {
        font-weight: 800;
    }
}
</style>
