<template>
    <div
        @click="switchBool = !switchBool">
        <p>
            <span>{{countryName}}</span>
            <span>{{countryFlag}}</span>
        </p>
        <ul :style="switchBool ? hideDisplay : showDisplay">
            <template v-if="countryDetails.name.common">
                <CountriesListItem :name="'Common'" :value="countryDetails.name.common" />
            </template>
            <template v-if="countryDetails.name.official">
                <CountriesListItem :name="'Official'" :value="countryDetails.name.official" />
            </template>
            <template v-if="countryDetails.independent">
                <CountriesListItem :name="'Independent'" :value="countryDetails.independent.toString()" />
            </template>
            <template v-if="countryDetails.status">
                <CountriesListItem :name="'Status'" :value="countryDetails.status" />
            </template>
            <template v-if="countryDetails.unMember">
                <CountriesListItem :name="'U.N. member'" :value="countryDetails.unMember.toString()" />
            </template>
            <template v-if="countryDetails.currencies">
                <CountriesListItem :name="'Currency'" :value="countryDetails.currencies[Object.keys(countryDetails.currencies)].name" />
            </template>
            <template v-if="countryDetails.capital">
                <CountriesListItem :name="'Capital'" :value="countryDetails.capital" />
            </template>
            <template v-if="countryDetails.region">
                <CountriesListItem :name="'Region'" :value="countryDetails.region" />
            </template>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';

import CountriesListItem from './CountriesListItem.vue'

const props = defineProps({
    countryName: String,
    countryFlag: String,
    countryDetails: Object
});

const switchBool = ref(true);

const hideDisplay = ref({
    display: 'none'
});
const showDisplay = ref({
    display: 'block'
});

</script>

<style scoped>
div {
    border: 2px solid rgba(0,0,0,1);
    border-radius: 5% / 15%;
    padding: .2rem .5rem;
    margin: .5rem;
    box-shadow: 0 0 5px 0 rgba(10,10,10,1);
}

p {
    display: grid;
    grid-template-columns: minmax(50%, 75%) auto;
}

p > span:first-child {
    text-align: center;
}

</style>
