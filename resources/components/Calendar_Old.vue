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
        <section class="col-span-7">
            <div class="w-full h-screen grid grid-cols-7 grid-rows-[repeat(7,_minmax(0,_1fr))]">
                <day-container  v-for="i in firstOfMonth" 
                        class="bg-slate-400"
                        :date="new Date(currentYear, previousMonth, (numDaysPreviousMonth + i - firstOfMonth))">
                    <template #day>
                        {{ numDaysPreviousMonth + i - firstOfMonth }}
                    </template>
                </day-container>
                <day-container v-for="j in numDaysOfMonth" class="bg-slate-50">
                    <template #day>
                        {{ j }}
                    </template>
                </day-container> 
                <day-container v-for="k in (49 - numDaysOfMonth - firstOfMonth )" 
                            class="bg-slate-400">
                    <template #day>
                        {{ k }}
                    </template>
                </day-container>
            </div>
        </section>
    </main>
</template>

<script setup>
import { ref, onBeforeMount } from 'vue';
import NavBar from './navigation/NavBar.vue';
import DayContainer from './calendar/DayContainer.vue';

const numDaysOfMonth = ref();
const numDaysPreviousMonth = ref();

const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
const months = [{name: 'january', days: 31},
                {name: 'february', days: 29},
                {name: 'march', days: 31},
                {name: 'april', days: 30},
                {name: 'may', days: 31},
                {name: 'june', days: 30},
                {name: 'juli', days: 31},
                {name: 'august', days: 31}, 
                {name: 'september', days: 30},
                {name: 'oktober', days: 31 },
                {name: 'november', days: 30 },
                {name: 'december', days: 31 }];

const currentYear = ref();
const currentMonth = ref();
const currentDate = ref();
const currentDay = ref();
const firstOfMonth = ref();
const previousMonth = ref();
const nextMonth = ref();

onBeforeMount(() => {
    let date = new Date();

    currentYear.value = date.getFullYear();
    currentMonth.value = months[date.getMonth()].name;
    currentDate.value =  date.getDate();
    currentDay.value = date.getDay() === 0 ? days[days.length - 1] : days[date.getDay() - 1];
    firstOfMonth.value = new Date(`1 ${currentMonth.value} ${currentYear.value}`).getDay();
    numDaysOfMonth.value = months[date.getMonth()].days;
    previousMonth.value = months[date.getMonth() - 1].name;
    numDaysPreviousMonth.value = months[date.getMonth() - 1].days;
    nextMonth.value = months[date.getMonth() + 1].name;
});
</script>

<style lang="scss" scoped>

</style>