import axios from "axios";
import { identity } from "lodash";
import errorHandler from "../../utils/errorHandler";

export default {
    namespaced: true,
    state() {
        return {
            categories: [],
            errors: [],
            errorCount: 0,
        };
    },
    getters: {
        getCategories(state) {
            return state.categories;
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
                await axios.get("/api/categories").then((res) => {
                    commit("addCategories", res.data.data);
                });
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },

        async store({ commit, dispatch }, payload) {
            try {
                await axios.post("/api/categories", payload);
                await dispatch("index");
                commit("remuveError");
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },

        async update({ commit, dispatch }, payload) {
            try {
                await axios.patch(`/api/categories/${payload.id}`, { motion: payload.motion });
                await dispatch("index");
                commit("remuveError");
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },

        async destroy({ commit, dispatch }, payload) {
            try {
                await axios.delete(`/api/categories/${payload.id}`);
                await dispatch("index");
                commit("remuveError");
            } catch (e) {
                commit("addErrors", errorHandler(e));
            }
        },
    },
    mutations: {
        addCategories(state, payload) {
            state.categories = payload;
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
