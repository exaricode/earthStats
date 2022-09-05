<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="flex flex-wrap">
        <drag-container>
            <time-component :timezone="''"
                            :title="'Local Time'">
            </time-component>
        </drag-container>
        <drag-container>
            <time-component :title="'New York'"
                            :timezone="'America/New_York'">
            </time-component>
        </drag-container>
        <drag-container>
            <time-component :title="'London'"
                            :timezone="'Europe/London'">

            </time-component>
        </drag-container>
        <drag-container>
            <time-component :title="'Tokyo'"
                            :timezone="'Asia/Tokyo'">
            </time-component>
        </drag-container>
    </main>"
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import DragContainer from './draggable/DragContainer.vue';
import TimeComponent from './TimeComponent.vue';

</script>

<style lang="scss" scoped>

</style>