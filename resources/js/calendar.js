import { createApp } from "vue";

import Calendar from '../components/Calendar.vue';

if (document.getElementById('calendar')) {
    createApp(Calendar).mount('#calendar');
}
