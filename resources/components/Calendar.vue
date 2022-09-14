<template>
    <div>
        <nav-bar></nav-bar>
    </div>
    <main class="grid grid-cols-7">
        <header class="col-span-7 grid grid-cols-7">
            <h2 class="col-span-7 grid grid-cols-4 font-medium text-3xl py-2">
                <button @click="previousMonth()" class="pl-2 hover:scale-150" value="previous">&#10094;</button>
                <span class="mx-auto col-span-2 inline-block">
                {{ days[current.day] }}  {{ current.date }}  {{ months[current.month].name }}  {{ current.year}}
                </span>
                <button @click="nextMonth()" class="pr-2 hover:scale-150" value="next">&#10095;</button>
            </h2>
            <div class="inline text-center font-bold border-b-2 border-solid border-b-black"
                v-for="day in days">
                {{ day }}
            </div>
        </header>
        <!-- TODO: adjust height -->
        <section class="col-span-7 flow-root relative h-screen">
            <event-modal :class="changeDisplay"
                @click.self="openModal = false"></event-modal>
            <div class="w-full h-screen grid grid-cols-7 grid-rows-[repeat(7,_minmax(0,_1fr))]">
                <day-container  v-for="i in current.firstDay"
                        class="bg-slate-400"
                        @calendar-event="(calendarEvent) => openCalendarEvent(calendarEvent)">
                    <template #day>
                        {{ current.previousMonth.days + i - current.firstDay }}
                    </template>
                </day-container>
                <day-container v-for="j in current.numDays" 
                        class="bg-slate-50"
                        @calendar-event="(calendarEvent) => openCalendarEvent(calendarEvent)">
                    <template #day>
                        {{ j }}
                    </template>
                </day-container> 
                <day-container v-for="k in (49 - current.numDays - current.firstDay)" 
                            class="bg-slate-400"
                            @calendar-event="(calendarEvent) => openCalendarEvent(calendarEvent)">
                    <template #day>
                        {{ k }}
                    </template>
                </day-container>
            </div>
        </section>
    </main>
</template>

<script setup>
import { ref, onBeforeMount, reactive, computed } from 'vue';
import NavBar from './navigation/NavBar.vue';
import DayContainer from './calendar/DayContainer.vue';
import CalendarMonth from '../js/classes/calendarMonth';
import EventModal from './calendar/EventModal.vue';

const current = ref(new CalendarMonth(new Date()));
const previous = ref();
const next = ref();
const openModal = ref(false);

const changeDisplay = computed(() => {
   return openModal.value ? 'block' : 'hidden';
});

const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
const months = [{name: 'January', days: 31},
                {name: 'February', days: 29},
                {name: 'March', days: 31},
                {name: 'April', days: 30},
                {name: 'May', days: 31},
                {name: 'June', days: 30},
                {name: 'July', days: 31},
                {name: 'August', days: 31}, 
                {name: 'September', days: 30},
                {name: 'October', days: 31 },
                {name: 'November', days: 30 },
                {name: 'December', days: 31 }];

onBeforeMount(() => {
    fillCurrentMonth();
    previous.value = new CalendarMonth(new Date(current.value.year, current.value.month - 1, 1));
    next.value = new CalendarMonth(new Date(current.value.year, current.value.month + 1, 1));
});

// set the month for a CalendarMonth
function previousMonth() {
    next.value = current.value;
    current.value = previous.value;
    fillCurrentMonth();

    previous.value = new CalendarMonth(new Date(current.value.year, current.value.month - 1, 1));
    next.value = new CalendarMonth(new Date(current.value.year, current.value.month + 1, 1));
    previous.value = new CalendarMonth(new Date(current.value.year, current.value.month - 1, 1));
}

function nextMonth() {
    previous.value = current.value;
    current.value = next.value;
    fillCurrentMonth();
    next.value = new CalendarMonth(new Date(current.value.year, current.value.month + 1), 1);
}

function fillCurrentMonth() {
    current.value.numDays = months[current.value.month].days;
    current.value.month > 0 
        ? current.value.previousMonth = months[current.value.month - 1] 
        : current.value.previousMonth = months[months.length -  1];
    current.value.month < months.length - 1
        ? current.value.nextMonth = months[current.value.month + 1]
        : current.value.nextMonth = months[0];
}

function openCalendarEvent(event) {
    console.log(event.target);
    if (event.target.classList.contains('bg-slate-400')) {
        console.log('class true')
    }
    openModal.value = true;
}
</script>

<style lang="scss" scoped>

</style>