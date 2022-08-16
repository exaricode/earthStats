<template>
    <li class="mx-2 uppercase group">
        {{ title }}
        <slot></slot>
    </li>
</template>

<script setup>
const props = defineProps({
    title: String
})
</script>

<style lang="scss" scoped>

</style>