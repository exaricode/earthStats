<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="flex flex-wrap">
        <drag-container>
            <weather-component></weather-component>
        </drag-container>
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import DragContainer from './draggable/DragContainer.vue';
import WeatherComponent from './WeatherComponent.vue';

</script>

<style lang="scss" scoped>

</style>