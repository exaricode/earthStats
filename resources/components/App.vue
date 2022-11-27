<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="flex flex-wrap justify-around">
        <drag-container>
            <date-component></date-component>
        </drag-container>
        <drag-container>
            <time-component :timezone="''"
                            :title="'Local Time'">
            </time-component>
        </drag-container>
        <drag-container>
            <weather-component :place="'local'"
                            :name="'Local Weather'">
            </weather-component>
        </drag-container>
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import DragContainer from './draggable/DragContainer.vue';
import DateComponent from './date/DateComponent.vue';
import TimeComponent from './time/TimeComponent.vue';
import WeatherComponent from './weather/WeatherComponent.vue';

import { ref } from 'vue';
</script>

<style scoped>

</style>
