<template>
    <ul class="hidden absolute -left-2 group-hover:block border-black border-2 border-solid
        rounded rounded-t-none bg-slate-100 z-10">
        <nav-sub-menu-topics v-for="(item, key) in props.subItem" :key="key"
            @click.self="changePage(item)">
        {{ item }}</nav-sub-menu-topics>
    </ul>
</template>

<script setup>
import NavSubMenuTopics from './NavSubMenuTopics.vue';

import { ref } from 'vue';

const props = defineProps({
    subItem: Array
});

function changePage(title){
    const regex = /\s|\W/g; 
    let tempTitle = title.replace(regex, '').toLowerCase().trim();    
    location.href = import.meta.env.BASE_URL + tempTitle;
}

</script>

<style scoped>

</style>