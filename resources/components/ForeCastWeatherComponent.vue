<template>
    <div class="grid grid-cols-6 gap-2">
        <ul class="inline" v-for="(item, index, key) in forecastArray" :key="key">
            <template v-for="(i, x, k) in item" :key="k">
                
                <template v-if="typeof i === 'object' && x != 'weather'">
                    <li v-for="(item, key) in i"> {{key}} : {{item}}</li>
                </template>
                <template v-else-if="x == 'weather'">
                    <hr class="w-full h-5 bg-black" />
                    <img :src="setWeatherImage(x.icon)" />
                </template>
                <template v-else>
                    <li>{{ i }}</li>
                </template>
            </template>

        </ul>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';

function setWeatherImage(thumb) {
    const imagePath = new URL ('../images/' + thumb + '.png', import.meta.url);
    return imagePath;    
}

const temp = ref();
// TODO: forecast weather
const forecast2 = reactive({
    dt: null,
    main: {
        temp: '-',
        feels: '-',
        min: '-',
        max: '-',
        pressure: '-',
        sea_level: '-',
        grnd_level: '-',
        humidity: '-',
        temp_kf: '-'
    },
    weather: {
        id: 0,
        main: '-',
        desc: '-',
        icon: 'unknown'
    },
    clouds: 0,
    wind: {
        speed: 0,
        deg: 0,
        gust: 0
    },
    visibility: 0,
    rain: '-'
});

// selected city info
const cityInfo = reactive({
    coords: {long: 0, lat: 0},
    country: '-',
    name: '-',
    population: 0,
    sunrise: '-',
    sunset: '-',
    timezone: '-'
});

const forecastArray = reactive([])

onMounted(async() => {
    await axios.post('getForeCastWeather')
        .then(response => { 
            setCityInfo(response.data.city);
            response.data.list.forEach(elem => forecastArray.push(setForecast(elem)));
        });
});

function setForecast(weather) {
    const forecast = reactive({});
    forecast.dt = new Date(weather.dt).toDateString();
    forecast.main = weather.main;
    forecast.weather = weather.weather[0];
    forecast.clouds = weather.clouds;
    forecast.wind = weather.wind;
    forecast.visibility = weather.visibility;
    forecast.rain = weather.rain;
    return forecast;
}

function setCityInfo(city) {
    cityInfo.coords.long = city.coord.long;
    cityInfo.coords.lat = city.coord.lat;
    cityInfo.country = city.country;
    cityInfo.name = city.name;
    cityInfo.population = city.population;
    cityInfo.sunrise = city.sunrise;
    cityInfo.sunset = city.sunset;
    cityInfo.timezone = city.timezone;
}

</script>

<style lang="scss" scoped>

</style>