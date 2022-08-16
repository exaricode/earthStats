<template>
    <ul class="flex justify-center items-end pt-4">
        <nav-menu-topics title="Home">
            <nav-sub-menu :subItem="homeMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Time">
            <nav-sub-menu :subItem="timeMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Date">
            <nav-sub-menu :subItem="dateMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Weather">
            <nav-sub-menu :subItem="weatherMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Calendar">
            <nav-sub-menu :subItem="calendarMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Earth">
            <nav-sub-menu :subItem="earthMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Valuta">
            <nav-sub-menu :subItem="valutaMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="Measures">
            <nav-sub-menu :subItem="measuresMenu"></nav-sub-menu>
        </nav-menu-topics>
        <nav-menu-topics title="calculators">
            <nav-sub-menu :subItem="calculatorMenu"></nav-sub-menu>
        </nav-menu-topics>
            
    </ul>
</template>

<script setup>
import NavMenuTopics from './NavMenuTopics.vue';
import NavSubMenu from './NavSubMenu.vue';
// import NavSubMenuTopics from './NavSubMenuTopics.vue';

import { ref } from 'vue';

const homeMenu = ref(['Newsletter', 'About us', 'Contact']);
const timeMenu = ref(['World Clock', 'Timezones', 'Personal Clock']);
const dateMenu = ref(['Calendar', 'Date calculator']);
const weatherMenu = ref(['Local', 'Worldwide', 'Forecast']);
const calendarMenu = ref(['Holidays', 'Personal calendar']);
const earthMenu = ref(['General info', 'Earth position',]);
const valutaMenu = ref(['Euro', 'Dollar', 'Yen']);
const measuresMenu = ref(['Distance', 'Weight']);
const calculatorMenu = ref(['Date/time', 'Conversion', 'Normal', 'Scientific']); 

</script>

<style scoped>

</style>