<template>
<!-- TODO: resize -->
    <div draggable="true"
        
        :style="{width: w + 'px', height: h + 'px' }"
        class="border-2 border-black border-solid rounded-sm
            resize m-2">
        <slot></slot>
    </div>
</template>

<script setup>
import {ref, computed} from 'vue';

const w = ref(300);
const h = ref(300);

</script>

<style scoped>

</style>