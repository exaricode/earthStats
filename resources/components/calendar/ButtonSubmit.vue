<template>
    <button type="submit" :value="btnValue" :style="extraStyleObject">
        {{ btnValue }}
    </button>
</template>

<script setup>
const props = defineProps({
    'btnValue': String,
    'extraStyleObject': Object
});
</script>

<style scoped>
button {
    width: 5rem;
    padding: .2rem .5rem;
    margin: .5rem .5rem;
    border-radius: 10% 5% / 5% 10%;
    grid-column-start: 2;
}
</style>