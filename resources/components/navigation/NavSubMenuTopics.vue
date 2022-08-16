<template>
    <li class="group-hover:block m-2">
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