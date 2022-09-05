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

function changePage(title) {
    location.href = import.meta.env.VITE_BASE_URL + ':' + import.meta.env.VITE_PORT + '/' + title.toLowerCase();
}
</script>

<style lang="scss" scoped>

</style>