import { createApp } from "vue";

import Clock from "../components/Clock.vue";

if (document.getElementById('clock')) {
    createApp(Clock).mount('#clock');
}