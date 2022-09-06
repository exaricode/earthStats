<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="grid grid-cols-7">
        <header class="col-span-7 grid grid-cols-7">
            <h2 class="col-span-7 text-center font-medium text-xl my-2">
                {{ currentDay }}  {{ currentDate }}  {{ currentMonth }}  {{ currentYear}}
            </h2>
            <div class="inline text-center font-bold border-b-2 border-solid border-b-black"
                v-for="day in days">
                {{ day }}
            </div>
        </header>
        <section>
            <div>
                {{ firstOfMonth }}
            </div>
        </section>
    </main>
</template>

<script setup>
import { ref, onBeforeMount } from 'vue';
import NavBar from './navigation/NavBar.vue';

const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
const months = ['january', 'february', 'march', 'april', 'may', 'june', 'juli', 'august', 'september', 'oktober', 'november', 'december'];

const currentYear = ref();
const currentMonth = ref();
const currentDate = ref();
const currentDay = ref();
const firstOfMonth = ref();

onBeforeMount(() => {
    let date = new Date();
    currentYear.value = date.getFullYear();
    currentMonth.value = months[date.getMonth()];
    currentDate.value =  date.getDate();
    currentDay.value = date.getDay() === 0 ? days[days.length - 1] : days[date.getDay() - 1];
    firstOfMonth.value = new Date(`1 ${currentMonth.value} ${currentYear.value}`);

    // TODO: create function where to begin counting
});


</script>

<style lang="scss" scoped>

</style>