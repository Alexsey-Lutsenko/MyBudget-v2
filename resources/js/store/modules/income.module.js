import axios from "axios";
import { identity } from "lodash";
import errorHandler from "../../utils/errorHandler";

export default {
    namespaced: true,
    state() {
        return {
            incomes: [],
            errors: [],
            errorCount: 0,
        };
    },
    getters: {
        getIncomes(state) {
            return state.incomes;
        },
        getErrors(state) {
            return state.errors;
        },
        getErrorCount(state) {
            return state.errorCount;
        },
    },
    actions: {
        async index({ commit }) {
            try {
                await axios.get("/api/incomes").then((res) => {
                    console.log(res);
                    commit("addIncomes", res.data.data);
                });
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },

        async store({ commit, dispatch }, payload) {
            try {
                await axios.post("/api/incomes", payload);
                await dispatch("index");
                commit("remuveError");
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },

        async destroy({ commit, dispatch }, payload) {
            try {
                await axios.delete(`/api/incomes/${payload.id}`);
                await dispatch("index");
                commit("remuveError");
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },
    },
    mutations: {
        addIncomes(state, payload) {
            state.incomes = payload;
        },
        addErrors(state, requests) {
            if (requests.message) {
                console.error("Error: " + requests.message);
            }

            if (requests.errors) {
                state.errorCount = 1;
            }
            state.errors = requests.errors;
        },
        remuveError(state) {
            state.errorCount = 0;
            state.errors = [];
        },
    },
};
