<template>
    <li class="group"
        @click.self="changePage(title)">
        {{ title }}
        <slot></slot>
    </li>
</template>

<script setup>
const props = defineProps({
    title: String
})

function changePage(title){
    const regex = /\s|\W/g; 
    let tempTitle = title.replace(regex, '').toLowerCase().trim(); 
    // TODO: add to .env file: VITE_PORT=8000   
    location.replace(import.meta.env.VITE_BASE_URL + ':' + import.meta.env.VITE_PORT + '/' + tempTitle.toLowerCase());
}
</script>

<style  scoped>
li {
    display: flow-root;
    position: relative;
    margin: 0 .5rem;
    text-transform: uppercase;
}

li:hover {
    background-color: rgba(0,0,0,1);
    color: rgba(255,255,255,1);
}
</style>