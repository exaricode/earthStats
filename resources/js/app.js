import { createApp } from "vue";

import App from "../components/App.vue";

if ( document.getElementById('app')) {
    createApp(App).mount("#app");
} 
