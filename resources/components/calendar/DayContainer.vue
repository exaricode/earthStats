<template>
    <div class="text-center border-2 border-black border-solid font-bold
            hover:scale-105" 
        :style="styleObject"
        @click.self="emitCalendarEvent($event)" >
        <slot name="day"></slot>
        
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
const styleObject = ref({
    textShadow: '.5px .5px 2px #050505, -.5px -.5px 2px #050505',
    fontSize: '1.5rem'
});

const emits = defineEmits(['calendarEvent'])

async function emitCalendarEvent(e) {
    emits('calendarEvent', e);
}

</script>

<style lang="scss" scoped>

</style>