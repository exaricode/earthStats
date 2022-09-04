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
    location.href = import.meta.env.BASE_URL + title.toLowerCase();
}
</script>

<style lang="scss" scoped>

</style>