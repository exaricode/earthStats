<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <form method="POST" action="/createCalendarEvent" enctype="multipart/form-data"
            class="w-fit h-2/3 mx-auto mt-8 bg-white border-2 border-black border-solid">
            <div>
                <label for="title">title</label>
                <input type="text" id="title" name="title" v-model="inputTitle" />
                    <span class="text-red-400">{{formError.title}}</span> 
            </div>
            <div>
                <label for="desc">description</label>
                <input type="text" id="desc" name="desc" v-model="inputDesc"/>
                    <span class="text-red-400">{{formError.desc}}</span> 
            </div>
            <div>
                <label for="start_date">Start</label>
                <input type="date" id="start_date" name="start_date" v-model="startDateValue" />
                    <span class="text-red-400">{{formError.start}}</span>
            </div>
            <div>
                <label for="end_date">End</label>
                <input type="date" id="end_date" name="end_date" />
            </div>

            <div>
                <p>Reminder 
                    <input type="radio" name="reminder" id="reminder_yes" value="yes" >
                    <label for="reminder_yes">Yes</label>
                    <input type="radio" name="reminder" id="reminder_no" value="no" checked>
                    <label for="reminder_no">No</label>
                </p>
            </div>
            
            <label for="alarm_time">Set alarm</label>
            <input type="number" name="alarm_time" id="alarm_time" min="0" max="10" step="1">
            
            <div class="col-span-2">
                <button type="submit" value="addEvent" id="addEvent"
                    class="mx-auto" @click.prevent="createCalendarEvent">add</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, computed } from 'vue';

const props = defineProps({
    calendarEvent: Object
});

const emits = defineEmits(['eventCreated']);

const formError = ref({
    title: undefined,
    desc: undefined,
    start_date: undefined,
});

const inputTitle = ref(undefined);
const inputDesc = ref(undefined);

const startDateValue = computed(() => {
    let year = props.calendarEvent.date.year;
    let month = props.calendarEvent.date.month + 1 < 10 
        ? '0' + (props.calendarEvent.date.month + 1)
        : (props.calendarEvent.date.month + 1);

    let day = props.calendarEvent.event.target == '' || !props.calendarEvent.event.target
        ? '' : props.calendarEvent.event.target.innerText > 9 
        ? props.calendarEvent.event.target.innerText : '0' + props.calendarEvent.event.target.innerText;
    return year + '-' + month + '-' + day;
});

function createCalendarEvent() {
    const form = document.forms[0];
    const data = {};
    if (inputTitle.value != undefined) {
        data.title = inputTitle.value;
        formError.value.title = undefined;
    } else {formError.value.title = 'Title is required'}

    if (inputDesc.value != undefined) {
        data.desc = inputDesc.value;
        formError.value.desc = undefined;
    } else { formError.value.desc = 'Description is required.'}

    if (startDateValue.value != undefined){
        data.start_date = startDateValue.value;
        formError.value.start_date = undefined;
    } else { formError.value.start_date = 'Start date is required' }
    
    data.end_date = !form[3].value ? startDateValue.value : form[3].value;
    data.reminder = form[4].checked ? form[4].value : form[5].value
    data.alarm_time = data.reminder ? form[6].value : 0;
    
    if (!formError.value.title && !formError.value.desc && !formError.value.start_date) {
        axios.post('createCalendarEvent', data)
            .then(response => response.data)
            .then(response => { 
                console.assert(response.start_date == props.calendarEvent.date.year + '-' 
                + props.calendarEvent.date.month + '-' + props.calendarEvent.date.date, 'start_date not equal');
                props.calendarEvent.event.target.innerHTML += "<div>" + response.title + "</div>";
            });
        emits('eventCreated');
    }
}

</script>

<style scoped>
label, input {
    margin: .5rem .5rem;
    align-self: center;
}

label {
    margin-left: auto;
}

input {
    margin-right: auto;
}


</style>