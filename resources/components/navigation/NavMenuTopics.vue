<template>
    <li class="group"
        @click.self="changePage(title)">
        {{ title }}
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
    border: .15rem solid rgba(0,0,0,1);
    border-bottom: none;
    border-top-right-radius: 10%;
    border-top-left-radius: 10%;
    border-top-width: .1rem;
    box-sizing: content-box;
    cursor: pointer;
}

li:hover {
    border-radius: 0%;
    box-shadow: .2rem -.2rem .25rem  black, -.2rem -.2rem .25rem  black;
    transition: box-shadow 1s linear, border-radius 1s linear;

}
</style>
