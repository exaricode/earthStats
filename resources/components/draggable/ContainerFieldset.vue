<template>
    <fieldset class="flex flex-col items-center h-full">
        <legend class="text-center w-full py-1
            border-b-2 border-b-black border-solid"> {{ legend }}</legend>
        
            <slot name="first" ></slot>
    </fieldset>
</template>

<script setup>
const props = defineProps({
    legend: String,

});
</script>

<style scoped>

</style>