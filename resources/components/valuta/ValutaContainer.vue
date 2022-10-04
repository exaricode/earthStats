<template>
    <valuta-select :optionSelection="valuta">

    </valuta-select>
</template>

<script setup>
import { ref , onBeforeMount } from 'vue';
import axios from 'axios';
import ValutaSelect from './ValutaSelect.vue';

const valuta = ref();

onBeforeMount(async () => {
    valuta.value = await axios.get('loadJson').then(response => response.data);
})

</script>

<style scoped>

</style>