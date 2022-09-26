<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <form method="POST" action="/createCalendarEvent" enctype="multipart/form-data"
            class="w-fit h-2/3 mx-auto mt-8 bg-white border-2 border-black border-solid">
            <div>
                <label for="title">title</label>
                <input type="text" id="title" name="title" 
                    v-model="inputTitle" 
                    ref="titleInput" />
                    <span class="text-red-400">{{formError.title}}</span> 
            </div>
            <div>
                <label for="desc">description</label>
                <input type="text" id="desc" name="desc" v-model="inputDesc"/>
                    <span class="text-red-400">{{formError.desc}}</span> 
            </div>
            <div>
                <label for="startDate">Start</label>
                <input type="date" id="startDate" name="startDate" :value="startDateValue" />
            </div>
            <div>
                <label for="endDate">End</label>
                <input type="date" id="endDate" name="endDate" />
            </div>

            <div>
                <p>Reminder 
                    <input type="radio" name="reminder" id="reminderYes" value="yes" >
                    <label for="reminderYes">Yes</label>
                    <input type="radio" name="reminder" id="reminderNo" value="no" checked>
                    <label for="reminderNo">No</label>
                </p>
            </div>
            <div>
                <label for="alarmTime">Set alarm</label>
                <input type="number" name="alarmTime" id="alarmTime" min="0" max="10" step="1">
            </div>
            
            <div class="col-span-2">
                <button type="submit" value="addEvent" id="addEvent"
                    class="mx-auto" @click.prevent="createCalendarEvent">add</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, computed, onMounted, watchEffect } from 'vue';

const props = defineProps({
    calendarEvent: Object
});

const emits = defineEmits(['eventCreated', 'newEvent']);

const inputTitle = ref(null);
const inputDesc = ref(null);
const titleInput = ref(null);

const formError = ref({
    title: computed(() =>  inputTitle.value == "" || inputTitle.value == undefined ? 'Title is required' : '' ),
    desc: computed(() => inputDesc.value == "" || inputDesc.value == undefined ? 'Desc is required' : '')
});

watchEffect(() => {
    if (titleInput.value) {
        titleInput.value.focus();   
    }
});

// set the value for input startDate
const startDateValue = computed(() => {
    let year = props.calendarEvent.date.year;
    let month = props.calendarEvent.date.month + 1 < 10 
        ? '0' + (props.calendarEvent.date.month + 1)
        : (props.calendarEvent.date.month + 1);

    let day = props.calendarEvent.event.target == '' || !props.calendarEvent.event.target
        ? '' : props.calendarEvent.event.target.dataset['date'] > 9 
        ? props.calendarEvent.event.target.dataset['date'] : '0' + props.calendarEvent.event.target.dataset['date'];
    return year + '-' + month + '-' + day;
});

function createCalendarEvent() {
    const form = document.forms[0];
    const data = {};
    if (inputTitle.value != undefined) {
        data.title = inputTitle.value;   
    }

    if (inputDesc.value != undefined) {
        data.desc = inputDesc.value;
    }

    if (startDateValue.value != undefined){
        data.startDate = form[2].value;
    } 
    
    data.endDate = !form[3].value ? form[2].value : form[3].value;
    data.reminder = form[4].checked ? form[4].value : form[5].value
    data.alarmTime = data.reminder ? form[6].value : 0;
    
    if (!formError.value.title && !formError.value.desc && !formError.value.startDate) {
        axios.post('createCalendarEvent', data)
            .then(response => response.data)
            .then(response => { 
                emits('newEvent', response );
                emits('eventCreated');
                inputTitle.value = undefined;
                inputDesc.value = undefined;
            });
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