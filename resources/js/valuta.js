import { createApp } from "vue";

import Valuta from '../components/Valuta.vue'
import.meta.glob([ '../images/flags/**', ]);
if (document.getElementById('valuta')) {
    createApp(Valuta).mount('#valuta');
}