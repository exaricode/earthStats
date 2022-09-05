import { createApp } from "vue";

import Clock from "../components/Clock.vue";

if (document.getElementById('clockMain')) {
    createApp(Clock).mount('#clockMain');
}