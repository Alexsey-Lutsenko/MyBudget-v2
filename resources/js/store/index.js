import Vuex from "vuex";

import category from "./modules/category.module";
import income from "./modules/income.module";

export default new Vuex.Store({
    modules: { category, income },
});
