<template>
    <div class="grid grid-cols-6 gap-2 w-full px-4">
        <ul class="inline border-2 border-black px-2" v-for="(item, key) in forecastArray" :key="key">
            <template v-for="(i, x) in item">
                
                <template v-if="typeof i === 'object' && x != 'weather'">
                    <li v-for="(item, key) in i"> {{key}} : {{item}}</li>
                </template>
                <template v-else-if="x == 'weather'">
                    <li>
                        <img :src="setWeatherImage(item[x].icon)" />
                    </li>
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

const temp = ref();

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
    let ts = new Date(weather.dt_txt);
    
    forecast.dt = ts.toLocaleString();
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

function setWeatherImage(thumb) {
    const imagePath = new URL ('../../images/weather/' + thumb + '.png', import.meta.url);
    return imagePath;    
}

</script>

<style scoped>

</style>