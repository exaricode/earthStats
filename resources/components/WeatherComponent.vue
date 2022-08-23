<template>
    <container-fieldset :legend="'Current Weather'">
        <template #first>
            <div v-if="currentWeather != null && currentWeather != undefined">
                <div v-if="currentWeather.coord != null && currentWeather.coord != undefined">
                    long: {{currentWeather.coord.lon}}
                    lat: {{currentWeather.coord.lat}}
                </div>
                 <div v-if="currentWeather.weather != null && currentWeather.weather != undefined">
                    state: {{currentWeather.weather[0]}}
                </div>
                <div v-if="currentWeather.temp != null && currentWeather.temp !=undefined">
                    <ul>
                        <li>temp: {{currentWeather.temp.temp}}</li>
                        <li>max: {{currentWeather.temp.temp_max}}</li>
                        <li>min: {{currentWeather.temp.temp_min}}</li>
                        <li>feels: {{currentWeather.temp.feels_like}}</li>
                        <li>humidity: {{currentWeather.temp.humidity}}</li>
                        <li>pressure: {{currentWeather.temp.pressure}}</li>
                    </ul>    
                </div>
            </div>
        </template>
        <template #second>
           
        </template>
    </container-fieldset>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';

import ContainerFieldset from './draggable/ContainerFieldset.vue';

const currentWeather = ref({
    coord: null,
    weather: null,
    temp: null,
});
const res = ref();

onMounted(async () => {
    currentWeather.value = await axios.post('getCurrentWeather')
        .then(response => {
            currentWeather.value.coord = response.data.coord;
            currentWeather.value.weather = response.data.weather;
            currentWeather.value.temp = response.data.main;
        });

    });

watch (currentWeather, (newWeather, oldWeather) => {
    console.log(newWeather);
    /* if (newWeather != undefined){ */
        currentWeather.value.coord = newWeather.coord;
        currentWeather.value.weather = newWeather.weather;
        currentWeather.value.temp = newWeather.temp;
    // }
});
</script>

<style lang="scss" scoped>

</style>