<template>
    <div>
        <NavBar />
    </div>
    <main class="flex flex-wrap">
        <DragContainer>
            <WeatherComponent :place="'local'"
                                :name="'Local Weather'" />
        </DragContainer>
        <DragContainer>
            <WeatherComponent :place="'New+York'"
                                :name="'New York'" />
        </DragContainer>
        <DragContainer>
            <WeatherComponent :place="'London'"
                                :name="'London'" />
        </DragContainer>
        <DragContainer>
            <WeatherComponent :place="'Tokyo'"
                                :name="'Tokyo'" />
        </DragContainer>
        <ForeCastWeatherComponent />
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import DragContainer from './draggable/DragContainer.vue';
import WeatherComponent from './WeatherComponent.vue';
import ForeCastWeatherComponent from './ForeCastWeatherComponent.vue';

</script>

<style lang="scss" scoped>

</style>