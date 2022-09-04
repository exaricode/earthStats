import { createApp } from "vue";

import Weather from '../components/Weather.vue';

if (document.getElementById('weather')) {
    createApp(Weather).mount('#weather');
}