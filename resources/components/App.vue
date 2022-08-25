<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="flex flex-wrap">
        <drag-container>
            <date-component class="h-full"></date-component>
        </drag-container>
        <drag-container>
            <time-component class="h-full" ></time-component>
        </drag-container>
        <drag-container>
            <weather-component class="h-full"></weather-component>
        </drag-container>
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import DragContainer from './draggable/DragContainer.vue';
import DateComponent from './DateComponent.vue';
import TimeComponent from './TimeComponent.vue';
import WeatherComponent from './WeatherComponent.vue';

import { ref } from 'vue';
</script>

<style scoped>

</style>