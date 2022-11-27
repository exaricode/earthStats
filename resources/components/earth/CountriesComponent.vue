<template>
    <div id="mainGrid">
        <div id="one" class="subGrid">
            <template v-for="item in arrOne">
                <CountriesContainer
                    :country-name="item.name.common"
                    :country-flag="item.flag"
                    :country-details="item" />
            </template>
        </div>
        <div id="two" class="subGrid">
            <template v-for="item in arrTwo">
                <CountriesContainer
                    :country-name="item.name.common"
                    :country-flag="item.flag"
                    :country-details="item" />
            </template>
        </div>
        <div id="three" class="subGrid">
            <template v-for="item in arrThree">
                <CountriesContainer
                    :country-name="item.name.common"
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
</template>

<script setup>
import { ref, onBeforeMount } from 'vue';
import axios from 'axios';

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
    grid-template-columns: repeat(4, minmax(75px, 300px));
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
