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
    margin: 0 .5rem;
    padding: .2rem .5rem .5rem;
    text-transform: uppercase;
    background-image: linear-gradient(rgb(165, 243, 252), rgb(103, 232, 249));
    border: 2px solid rgba(0,0,0,.5);
    box-shadow: 0 -2px 10px rgba(0,0,0,1);
    border-bottom: none;
    border-top-right-radius: 10%;
    border-top-left-radius: 10%;
}

li:hover {
    transform: scale(1.2);
    font-weight: 900;
    transition: font-weight 5s linear;
}
</style>
