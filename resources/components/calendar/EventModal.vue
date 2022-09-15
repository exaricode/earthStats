<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <form method="POST" action="/createCalendarEvent" enctype="multipart/form-data"
            class="w-fit h-2/3 mx-auto mt-8 bg-white border-2 border-black border-solid">
            <div>
                <label for="title">title</label>
                <input type="text" id="title" name="title" />
            </div>
            <div>
                <label for="desc">description</label>
                <input type="text" id="desc" name="desc" />
            </div>
            <div>
                <label for="start_date">Start</label>
                <!-- TODO: default value clicked date -->
                <input type="date" id="start_date" name="start_date" value=""/>
            </div>
            <div>
                <label for="end_date">End</label>
                <input type="date" id="end_date" name="end_date" />
            </div>

            <div>
                <p>Reminder 
                    <label for="reminder_yes">Yes</label>
                    <input type="radio" name="reminder" id="reminder_yes" value="yes" checked>
                    <label for="reminder_no">No</label>
                    <input type="radio" name="reminder" id="reminder_no" value="no">
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


const props = defineProps({
    calendarEvent: Object
});

function createCalendarEvent() {
    const form = document.forms[0];

    const data = {
        title: form[0].value,
        desc: form[1].value,
        start_date: form[2].value,
        end_date: form[3].value,
        reminder: form[4].checked ? form[4].value : form[5].value,
        alarm_time: form[6].value,
    }
    console.log(data);
    axios.post('createCalendarEvent', data);
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