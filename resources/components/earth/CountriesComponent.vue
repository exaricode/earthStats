<template>
    <div v-for="(country, key) in countriesAll" :key="country.name.common">
        <DragContainer >
        <ContainerFieldset :legend="country.name.official + '  ' +  country.flag">
            <template #first>
                <div>
                    <span>{{Object.keys(country.name)[2]}}</span>
                    <span>{{country.name.nativeName[Object.keys(country.name.nativeName)[0]].official}}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[11]}}</span>
                    <span>{{country.capital[0] }}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[13]}}</span>
                    <span>{{country.region}}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[14]}}</span>
                    <span>{{country.subregion}}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[15]}}</span>
                    <span>{{country.languages[Object.keys(country.languages)[0]]}}</span>
                </div>
                <div>
                    <h3>{{Object.keys(country)[9]}}</h3>
                    <span>{{Object.keys(country.currencies)[0]}}</span>
                    <span>{{country.currencies[Object.keys(country.currencies)[0]].name}}</span>
                    <span>{{country.currencies[Object.keys(country.currencies)[0]].symbol}}</span>
                </div>
                
                <img :src="country.flags.svg" />
            </template>
        </ContainerFieldset>
        </DragContainer>
    </div>
</template>

<script setup>
import { ref, onBeforeMount } from 'vue';
import axios from 'axios';

import ContainerFieldset from '../draggable/ContainerFieldset.vue';
import DragContainer from '../draggable/DragContainer.vue';

const countriesAll = ref();
onBeforeMount(async () => {
    countriesAll.value = await axios.get('/getCountries')
        .then(response => response.data);
})

</script>

<style scoped>
span {
    padding: .2rem .5rem;
    margin: .2rem .5rem;
}

img {
    width: 25%;
}
</style>