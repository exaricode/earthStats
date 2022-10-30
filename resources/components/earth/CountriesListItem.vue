<template>
    <li><span>{{name}}</span>:<span>{{value}}</span></li>
</template>

<script setup>
defineProps({
    name: String,
    value: String
})
</script>

<style scoped>

</style>