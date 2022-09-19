<template>
    <container-fieldset :legend="name">
        <template #first>
            <div v-if="currentWeather != null && currentWeather != undefined" 
                class="flex flex-wrap items-center justify-around h-full">
                <div v-if="currentWeather.coord != null && currentWeather.coord != undefined"
                    class="w-full">
                    long: {{currentWeather.coord.lon}}
                    lat: {{currentWeather.coord.lat}}
                </div>
                <div v-if="currentWeather.temp != null && currentWeather.temp !=undefined">
                    <ul>
                        <li>temp: {{currentWeather.temp.temp}} </li><li>feels: {{currentWeather.temp.feels_like}}</li>
                        <li>min: {{currentWeather.temp.temp_min}} </li><li>max: {{currentWeather.temp.temp_max}}</li>
                        <li>humidity: {{currentWeather.temp.humidity}} </li><li>pressure: {{currentWeather.temp.pressure}}</li>
                    </ul>    
                </div>
           
                <img v-if="currentWeather.weather != undefined
                    && currentWeather.weather != null" 
                :src="currentWeather.imagePath"
                alt=""
                class="inline hover:scale-125" />
                <img src="../images/windforce.svg" :style="{
                    width: '20%'
                }" />
            </div>
        </template>
    </container-fieldset>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';

import ContainerFieldset from './draggable/ContainerFieldset.vue';

const props = defineProps({
    place: String,
    name: String
});

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
    imagePath: setWeatherImage('unknown')
});

onMounted(async () => {
    if (navigator.geolocation && props.place == 'local') {
        getUserPosition();
    } else if (props.place != '') {
        await axios.post('getCurrentWeatherPlace', {
                place: props.place
            })
            .then(response => {
                setWeather(response);
            });
    } else {
        await axios.post('getCurrentWeather')
            .then(response => {
                setWeather(response);
            });
    }
});

function setWeather(response) {
    if (response.data.cod === 200){
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

        await axios.post('getCurrentWeatherPos', {
                longitude: crd.longitude,
                latitude: crd.latitude
                })
            .then(response => {
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