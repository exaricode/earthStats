<template>
    <header>
        <slot>{{ heading }}</slot>
    </header>
</template>

<script setup>
const props = defineProps({
    heading: String
})
</script>

<style scoped>

</style>