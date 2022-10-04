<template>
    <div :style="divStyleObject"
        v-for="options in optionSelection" :key="options.code">
        <img :style="imgStyleObject"
            :src="imageUrl(options.code)" />
        <span>
            {{ options.name }} 
        </span>
        <span>
            {{ options.currency.name}}
        </span>
    </div>
</template>

<script setup>
import { ref } from 'vue';
const props = defineProps({
    optionSelection: Array,
});

const divStyleObject = ref({
    
    width: 'fit-content',
    height: '2rem',
    border: '2px inset black',
})

const imgStyleObject = ref({
    width: '2rem',
    height: '2rem',
    display: 'inline-block'
})

function imageUrl(url){
    return new URL('../../images/flags/' + url.toLowerCase() + '.svg', import.meta.url);
}
</script>

<style scoped>

</style>