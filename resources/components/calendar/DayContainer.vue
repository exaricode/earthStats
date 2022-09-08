<template>
    <div class="text-center border-2 border-black border-solid font-bold
        hover:scale-105" :style="styleObject" data-day="">
        <slot name="day"></slot>
        {{props.date}}
    </div>
</template>

<script setup>
import { ref } from 'vue';
const styleObject = ref({
    textShadow: '.5px .5px 2px #050505, -.5px -.5px 2px #050505',
    fontSize: '1.5rem'
});

const props = defineProps({
    date: String
})

</script>

<style lang="scss" scoped>

</style>