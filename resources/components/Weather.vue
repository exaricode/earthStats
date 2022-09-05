<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="flex flex-wrap">
        <drag-container>
            <weather-component :place="'local'"
                                :name="'Local Weather'">
            </weather-component>
        </drag-container>
        <drag-container>
            <weather-component :place="'New+York'"
                                :name="'New York'">
            </weather-component>
        </drag-container>
        <drag-container>
            <weather-component :place="'London'"
                                :name="'London'">
            </weather-component>
        </drag-container>
        <drag-container>
            <weather-component :place="'Tokyo'"
                                :name="'Tokyo'">
            </weather-component>
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