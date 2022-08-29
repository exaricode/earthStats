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
                        <li>temp: {{currentWeather.temp.temp}} feels: {{currentWeather.temp.feels_like}}</li>
                        <li>min: {{currentWeather.temp.temp_min}} max: {{currentWeather.temp.temp_max}}</li>
                        <li>humidity: {{currentWeather.temp.humidity}} pressure: {{currentWeather.temp.pressure}}</li>
                    </ul>    
                </div>
            </div>
        </template>
        <template #second>
           <img v-if="currentWeather.weather != undefined
                    && currentWeather.weather != null" 
                :src="currentWeather.imagePath"
                alt=""
                class="inline" />
        </template>
    </container-fieldset>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';

import ContainerFieldset from './draggable/ContainerFieldset.vue';

const currentWeather = reactive({
    coord: null,
    weather: null,
    temp: null,
    wind: null,
    clouds: null,
    dt: null,
    sys: null,
    timezone: null,
    id: null,
    name: null,
    cod: null,
    imagePath: null
});

onMounted(async () => {
    if (navigator.geolocation) {
        getUserPosition();
    } else {
        await axios.post('getCurrentWeather')
            .then(response => {
                console.log(response);
                setWeather(response);
            });
    }
});

function setWeather(response) {
    currentWeather.coord = response.data.coord;
    currentWeather.weather = response.data.weather;
    currentWeather.temp = response.data.main;
    currentWeather.wind = response.data.wind;
    currentWeather.clouds = response.data.clouds;
    currentWeather.dt = response.data.dt;
    currentWeather.sys = response.data.sys;
    currentWeather.timezone = response.data.timezone;
    currentWeather.id = response.data.id;
    currentWeather.name = response.data.name;
    currentWeather.cod = response.data.cod;
    currentWeather.imagePath = setWeatherImage(currentWeather.weather[0].icon);
}

function setWeatherImage(thumb) {
    const imagePath = new URL ('../images/' + thumb + '.png', import.meta.url);
    return imagePath;    
}

function getUserPosition() {
    const data = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    }

    async function success(pos) {
        const crd = pos.coords;
/* 
        console.log('Your current position is:');
        console.log(`Latitude : ${crd.latitude}`);
        console.log(`Longitude: ${crd.longitude}`);
        console.log(`More or less ${crd.accuracy} meters.`); */

        await axios.post('getCurrentWeatherPos', {
                longitude: crd.longitude,
                latitude: crd.latitude
                })
            .then(response => {
                console.log(response);
                setWeather(response);
                });
    }

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }
    
    navigator.geolocation.getCurrentPosition(success, error, data);
}

</script>

<style lang="scss" scoped>

</style>