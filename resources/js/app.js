require("./bootstrap");

import { createApp } from "vue";
import App from "./views/App";
import router from "./router";

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import icons from "./components/icons";

const app = createApp(App);

app.component("font-awesome-icon", FontAwesomeIcon).use(router).mount("#app");
