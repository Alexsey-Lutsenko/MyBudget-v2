<template>
    <div class="d-flex justify-content-center">
        <h1>Категории</h1>
    </div>
    <div class="my-5 d-flex">
        <input
            type="text"
            class="category-add-input form-control mx-2"
            placeholder="Новая категория"
            @keyup.enter="createNewCategory()"
            v-model="newCategory"
        />
        <button class="btn btn-primary" v-if="newCategory.length > 2" @click="createNewCategory()">+</button>
    </div>

    <div class="error-category" v-if="errorCategory">{{ errorCategory }}</div>

    <div class="d-flex justify-content-center">
        <app-loader v-if="loading"></app-loader>
    </div>
    <div class="categories-table" v-if="!loading">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Категория</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(category, idx) in categories" :key="category.id">
                    <td>{{ category.category }}</td>
                    <td>
                        <button class="custom-btn btn p-0" @click="updateMotion(category.id, 'up')">
                            <font-awesome-icon icon="fa-solid fa-arrow-up" v-if="idx !== 0" />
                        </button>
                    </td>
                    <td>
                        <button class="custom-btn btn p-0" @click="updateMotion(category.id, 'down')">
                            <font-awesome-icon icon="fa-solid fa-arrow-down" v-if="idx !== maxCategoryPriority" />
                        </button>
                    </td>
                    <td>
                        <button class="custom-btn button-delete-category btn p-0" @click="deleteCategory(category.id)">
                            <font-awesome-icon icon="fa-solid fa-trash" />
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { useStore } from "vuex";

export default {
    data() {
        return {
            loading: false,
            user_id: 1,
            newCategory: "",
            errorCategory: "",
        };
    },
    created() {
        this.getAllCategories();
    },
    methods: {
        async getAllCategories() {
            this.loading = true;
            await this.$store.dispatch("category/index");
            this.loading = false;
        },

        async createNewCategory() {
            this.errorCategory = "";
            let error = !!this.categories.find((category) => category.category === this.newCategory)?.id;

            if (error) {
                this.errorCategory = "Такая категория уже есть";
                return;
            }

            this.loading = true;
            await this.$store.dispatch("category/store", { category: this.newCategory });
            this.loading = false;

            this.newCategory = "";
        },

        async updateMotion(id, motion) {
            await this.$store.dispatch("category/update", { id: id, motion: motion });
        },

        async deleteCategory(id) {
            await this.$store.dispatch("category/destroy", { id: id });
        },
    },
    computed: {
        categories() {
            return this.$store.getters["category/getCategories"];
        },
        maxCategoryPriority() {
            return this.categories.length - 1;
        },
    },
    watch: {
        errorCategory(newErrorCategory, oldErrorCategory) {
            if (newErrorCategory.length > 0) {
                setTimeout(() => (this.errorCategory = ""), 3000);
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.category-add-input:focus {
    box-shadow: none;
    border-color: #666666;
}
.error-category {
    background: #ffdbdb;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.categories-table {
    width: 100%;
    max-height: 500px;
    overflow: auto;
}
.button-delete-category {
    color: red;
    font-size: 16px;
}
.custom-btn:focus {
    box-shadow: none;
}
table td {
    padding: 5px;
    vertical-align: middle;
}
</style>
