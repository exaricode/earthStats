<template>
    <nav class="bg-gradient-to-b from-cyan-200 to-cyan-300">
        <h1 class="text-5xl mx-auto text-center pt-4">Earth Statistics</h1>
        <nav-menu></nav-menu>
    </nav>
</template>

<script setup>
import NavMenu from "./NavMenu.vue";

import { onMounted } from "vue";

onMounted(() => {
    console.log(import.meta.env);
})
</script>

<style scoped>

</style>