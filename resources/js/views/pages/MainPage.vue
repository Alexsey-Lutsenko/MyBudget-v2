<template>
    <div class="d-flex justify-content-center mb-5">
        <h1>Ввод данных</h1>
    </div>

    <div class="d-flex justify-content-center">
        <input type="number" step="100" class="form-control mx-2" v-model="newIncome" />
        <button class="btn btn-success" @click.prevent="createNewIncome">Income</button>
    </div>

    <div>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Доход</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(income, idx) in incomes" :key="income.id">
                    <td>{{ income.income + " RUB" }}</td>
                    <td>
                        <button class="custom-btn button-delete-category btn p-0" @click="deleteIncome(income.id)">
                            <font-awesome-icon icon="fa-solid fa-trash" />
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            newIncome: null,
        };
    },

    created() {
        this.getAllIncomes();
    },

    methods: {
        async getAllIncomes() {
            this.loading = true;
            await this.$store.dispatch("income/index");
            this.loading = false;
        },

        async createNewIncome() {
            await this.$store.dispatch("income/store", { income: this.newIncome });
        },
        async deleteIncome(id) {
            await this.$store.dispatch("income/destroy", { id: id });
        },
    },

    computed: {
        incomes() {
            return this.$store.getters["income/getIncomes"];
        },
    },
};
</script>

<style scoped lang="scss">
.custom-btn {
    color: red;
    &:focus {
        box-shadow: none;
    }
}
</style>
