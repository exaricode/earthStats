import { createApp } from "vue";

import Countries from '../components/Countries.vue';

if (document.getElementById('countries')) {
    createApp(Countries).mount('#countries');
}