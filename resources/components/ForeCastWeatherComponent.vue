<template>
    <div>
        <div class="inline" v-for="(item, index, key) in forecast" :key="key">
            {{index}} : {{item}}
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';

// TODO: forecast weather

const forecast = ref();

onMounted(async() => {
    await axios.post('getForeCastWeather')
        .then(response => { 
            // forecast.value = response.data.list;
            console.log(response.data);
        });
});

function setForecast(weather) {
    /*  { "dt": 1662411600, 
    "main": { "temp": 22.58, "feels_like": 22.88, "temp_min": 20.1, "temp_max": 22.58, "pressure": 1020, "sea_level": 1020, "grnd_level": 1018, "humidity": 76, "temp_kf": 2.48 }, 
    "weather": [ { "id": 500, "main": "Rain", "description": "light rain", "icon": "10n" } ], 
    "clouds": { "all": 0 }, 
    "wind": { "speed": 1.45, "deg": 302, "gust": 1.45 }, 
    "visibility": 10000, 
    "pop": 0.29, 
    "rain": { "3h": 0.23 }, 
    "sys": { "pod": "n" }, 
    "dt_txt": "2022-09-05 21:00:00" }
    */
}

</script>

<style lang="scss" scoped>

</style>