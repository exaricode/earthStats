<template>
    <li class="mx-2 uppercase group flow-root relative hover:bg-black hover:text-white"
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

<style lang="scss" scoped>

</style>