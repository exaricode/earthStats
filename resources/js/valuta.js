import { createApp } from "vue";

import Valuta from '../components/Valuta.vue'

if (document.getElementById('valuta')) {
    createApp(Valuta).mount('#valuta');
}