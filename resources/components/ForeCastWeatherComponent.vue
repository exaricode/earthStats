<template>
    <div class="grid grid-cols-12 gap-2">
        <ul class="inline" v-for="(item, index, key) in forecastArray" :key="key">
            {{ i == typeof(Object) ? temp.value = item[i] : i}}
            
            <li v-for="(i, k) in item" :key="k">
                
            </li>

        </ul>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';

const temp = ref();
// TODO: forecast weather
const forecast = reactive({
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
            response.data.list.forEach(elem => forecastArray.push(elem));
            // setForecast(response.data.list);
        });
});

function setForecast(weather) {
    forecast.dt = weather.dt;
    forecast.main.temp = weather.main.temp;
    forecast.main.feels = weather.main.feels;
    forecast.main.min = weather.main.min;
    forecast.main.max = weather.main.max;
    forecast.main.pressure = weather.main.pressure;
    forecast.main.sea_level = weather.main.sea_level;
    forecast.main.grnd_level = weather.main.grnd_level;
    forecast.main.humidity = weather.main.humidity;
    forecast.main.temp_kf = weather.main.temp_kf;
    forecast.weather.id = weather.weather.id;
    forecast.weather.main = weather.weather.main;
    forecast.weather.desc = weather.weather.desc;
    forecast.weather.icon = weather.weather.icon;
    forecast.clouds = weather.clouds;
    forecast.wind.speed = weather.wind.speed;
    forecast.wind.deg = weather.wind.deg;
    forecast.wind.gust = weather.wind.gust;
    forecast.visibility = weather.visibility;
    forecast.rain = weather.rain;
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