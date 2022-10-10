import { createApp } from "vue";

import Earth from '../components/Earth.vue';

if (document.getElementById('earth')){
    createApp(Earth).mount('#earth')
}