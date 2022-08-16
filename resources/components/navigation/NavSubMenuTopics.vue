<template>
    <li class="group-hover:block p-2 hover:bg-gray-400">
        <slot>{{ title }}</slot>
    </li>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    title: String,
});
</script>

<style scoped>

</style>