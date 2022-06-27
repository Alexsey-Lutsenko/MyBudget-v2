require("./bootstrap");

import { createApp } from "vue";
import App from "./views/App";
import router from "./router";
import store from "./store";
import component from "./components/ui";

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import icons from "./components/icons";

const app = createApp(App);

component.forEach((component) => {
    app.component(component.name, component);
});

app.component("font-awesome-icon", FontAwesomeIcon).use(router).use(store).mount("#app");
