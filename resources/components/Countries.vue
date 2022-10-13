<template>
    <div>
        <NavBar />
    </div>
    <main class="flex flex-wrap justify-evenly">
        <CountriesComponent />
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import CountriesComponent from './earth/CountriesComponent.vue';
</script>

<style scoped>

</style>