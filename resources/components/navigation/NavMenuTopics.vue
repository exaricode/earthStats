<template>
    <li class="mx-2 uppercase group flow-root relative">
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