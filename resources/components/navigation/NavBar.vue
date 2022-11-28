<template>
    <nav class="bg-gradient-to-b from-cyan-200 to-cyan-300">
        <h1 class="text-5xl mx-auto text-center">Earth Statistics</h1>
        <nav-menu></nav-menu>
    </nav>
</template>

<script setup>
import NavMenu from "./NavMenu.vue";
</script>

<style scoped>
h1 {
    text-transform: uppercase;
    font-family: Georgia, serif;
    font-size: 4rem;
    font-weight: 700;
    text-shadow: 0  20px 10px rgb(54, 102, 149);
    padding: 1rem 1rem;
}
</style>
