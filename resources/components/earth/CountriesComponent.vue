<template>
    <div id="mainGrid">
        <div id="one" class="subGrid">
            <template v-for="item in arrOne">
                <CountriesContainer 
                    :country-name="item.name.official"
                    :country-flag="item.flag"
                    :country-details="item" />
            </template>
        </div>
        <div id="two" class="subGrid">
            <template v-for="item in arrTwo">
                <CountriesContainer 
                    :country-name="item.name.official"
                    :country-flag="item.flag"
                    :country-details="item" />
            </template>
        </div>
        <div id="three" class="subGrid">
            <template v-for="item in arrThree">
                <CountriesContainer 
                    :country-name="item.name.official"
                    :country-flag="item.flag"
                    :country-details="item" />
            </template>
        </div>
        <div id="four" class="subGrid">
            <template v-for="item in arrFour">
                <CountriesContainer 
                    :country-name="item.name.official"
                    :country-flag="item.flag"
                    :country-details="item" />
            </template>
        </div>
    </div>
    <!-- <div v-for="(country, key) in countriesAll" :key="country.name.common">
        <ContainerFieldset :legend="country.name.official + '  ' +  country.flag">
            <template #first>
                <div>
                    <span>{{Object.keys(country.name)[2]}}</span>
                    <span>{{country.name.nativeName[Object.keys(country.name.nativeName)[0]].official}}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[5]}}</span>
                    <span>{{country.capital[0] }}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[6]}}</span>
                    <span>{{country.region}}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[7]}}</span>
                    <span>{{country.subregion}}</span>
                </div>
                <div>
                    <span>{{Object.keys(country)[8]}}</span>
                    <span>{{country.languages[Object.keys(country.languages)[0]]}}</span>
                </div>
                <div>
                    <h3>{{Object.keys(country)[4]}}</h3>
                    <span>{{Object.keys(country.currencies)[0]}}</span>
                    <span>{{country.currencies[Object.keys(country.currencies)[0]].name}}</span>
                    <span>{{country.currencies[Object.keys(country.currencies)[0]].symbol}}</span>
                </div>
                
                <img :src="country.flags.svg" />
            </template>
        </ContainerFieldset>
        
    </div> -->
</template>

<script setup>
import { ref, onBeforeMount } from 'vue';
import axios from 'axios';

import ContainerFieldset from '../draggable/ContainerFieldset.vue';
import DragContainer from '../draggable/DragContainer.vue';
import CountriesContainer from './CountriesContainer.vue';

const countriesAll = ref();

const arrOne = ref([]);
const arrTwo = ref([]);
const arrThree = ref([]);
const arrFour = ref([]);

onBeforeMount(async () => {

    countriesAll.value = await axios.get('/getCountries')
        .then(response => response.data)
        .then(response => {
            response.forEach((elem, index )=> {
                if (index % 4 == 0) arrOne.value.push(elem);
                else if (index % 4 == 1) arrTwo.value.push(elem);
                else if (index % 4 == 2) arrThree.value.push(elem);
                else arrFour.value.push(elem);
            })
        })
})

</script>

<style scoped>
#mainGrid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    margin: 0 .5rem;
}

.subGrid {
    display: flex;
    flex-direction: column;
}

span {
    padding: .2rem .5rem;
    margin: .2rem .5rem;
}

img {
    width: 25%;
}
</style>