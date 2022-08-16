<template>
    <ul class="hidden absolute group-hover:block border-black border-2 border-solid
        rounded border-t-0 rounded-t-none">
        <nav-sub-menu-topics v-for="(item, key) in props.subItem" :key="key">
        {{ item }}</nav-sub-menu-topics>
    </ul>
</template>

<script setup>
import NavSubMenuTopics from './NavSubMenuTopics.vue';

import { ref } from 'vue';

const props = defineProps({
    subItem: Array
});

</script>

<style scoped>

</style>