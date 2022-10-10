<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <form method="POST" action="/updateCalendarEvent" enctype="multipart/form-data" 
            class="bg-white border-2 border-black border-solid text-center">
            <template v-if="calendarEvent">
                <div>
                    <label for="updateTitle">title</label>
                    <input type="text" id="updateTitle" name="updateTitle" 
                        ref="inputTitle"
                        :disabled="editTitle"
                        v-model="calendarEvent.title"
                        @blur="editTitle = editTitle ? false : true" />
                        <ButtonInputEdit 
                            :editBool="editTitle"
                            @edit-input="(editInput) => editTitle = editInput ? true : false" />
                </div>
                <div>
                    <label for="updateDesc">description</label>
                    <input type="text" id="updateDesc" name="updateDesc"
                        ref="inputDesc"
                        :disabled="editDesc"
                        v-model="calendarEvent.desc"
                        @blur="editDesc = editDesc ? false : true" />
                        <ButtonInputEdit
                            :editBool="editDesc"
                            @edit-input="(editInput) => editDesc = editInput ? true : false" />
                </div>
                <div>
                    <label for="updateStartDate">Start</label>
                    <input type="date" id="updateStartDate" name="updateStartDate"
                        ref="inputStartDate"
                        :disabled="editStartDate"
                        v-model="calendarEvent.start_date" />
                        <ButtonInputEdit
                            :editBool="editStartDate"
                            @edit-input="(editInput) => editStartDate = editInput ? true : false" />
                </div>
                <div>
                    <label for="updateEndDate">End</label>
                    <input type="date" name="updateEnddate" id="updateEnddate"
                        ref="inputEndDate"
                        :disabled="editEndDate"
                        v-model="calendarEvent.end_date" />
                        <ButtonInputEdit
                            :editBool="editEndDate"
                            @edit-input="(editInput) => editEndDate = editInput ? true : false" />
                </div>
                <div>
                    <fieldset>
                        <legend>Reminder</legend>
                        <label for="updateReminderYes">
                            <input type="radio" name="updateReminder" id="updateReminderYes" 
                                value="yes" 
                                :disabled="editReminder" 
                                :checked="calendarEvent.reminder == 1">
                        Yes</label>
                        <label for="updateReminderNo">
                            <input type="radio" name="updateReminder" id="updateReminderNo" 
                            value="no" 
                            :disabled="editReminder"
                            :checked="calendarEvent.reminder == 0" >
                        No</label>
                    </fieldset>
                    <ButtonInputEdit
                            :editBool="editReminder"
                            @edit-input="(editInput) => editReminder = editInput ? true : false" />
                </div>
                <div>
                    <label for="updateAlarmTime"></label>
                    <input type="number" name="updateAlarmTime" id="updateAlarmTime"
                        :value="calendarEvent.alarm_time"
                        :disabeld="editAlarm">
                        <ButtonInputEdit
                            :editBool="editAlarm"
                            @edit-input="(editInput) => editAlarm = editInput ? true : false" />
                </div>
                <div>
                    <span class="col-start-2">
                        <ButtonSubmit :btn-value="'update'"
                            :extra-style-object="{backgroundColor: 'rgba(30,30,200,.8)'}"
                            @click.prevent="updateEvent(calendarEvent)" />
                        <ButtonSubmit :btn-value="'delete'"
                            :extra-style-object="{backgroundColor: 'rgba(200, 30, 30, 1)'}"
                            @click.prevent="deleteEvent(calendarEvent)" />
                    </span>
                </div>
            </template>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, watchEffect, onMounted } from 'vue';

import ButtonInputEdit from './ButtonInputEdit.vue';
import ButtonSubmit from './ButtonSubmit.vue';

const props = defineProps({
    calendarEvent: Object
});

const emits = defineEmits([
    'event-updated', 'event-deleted', 'event-close'
])

// input refs
const inputTitle = ref(null);
const inputDesc = ref(null);
const inputStartDate = ref(null);
const inputEndDate = ref(null);

// input disabled bool
const editTitle = ref(true);
const editDesc = ref(true);
const editStartDate = ref(true);
const editEndDate = ref(true);
const editReminder = ref(true);
const editAlarm = ref(true);

// TODO: focus input
onMounted(() => {
    watchEffect(() => {
        if (inputTitle.value && !editTitle.value) {
            inputTitle.value.focus();
        }
        if(inputDesc.value && !editDesc.value) {
            inputDesc.value.focus();
        }
        if(inputStartDate.value && !editStartDate.value) {
            inputStartDate.value.focus();
        }
        if(inputEndDate.value && !editEndDate.value) {
            inputEndDate.value.focus();
        }
    });
});

function updateEvent(event) {
    editTitle.value = true;
    editDesc.value = true;
    editStartDate.value = true;
    editEndDate.value = true;
    editReminder.value = true;
    editAlarm.value = true; 

    // TODO: Add dynamic user_id
    event.user_id = 1;
    axios.post('updateCalendarEvent', event)
        .then(response => {
            emits('event-updated', response.data);
            emits('event-close');
        });
    
}

function deleteEvent(event) {
    axios.post('deleteCalendarEvent', event)
        .then(response => {
            if (response.data == 'Succesfull') {
                emits('event-close');
                emits('event-deleted', event);
            }
        });             
}
</script>

<style scoped>
form {
    width: 50%;
    height: 75%;
    margin: 2rem auto;
    border-radius: 2% 2%;
    box-shadow: 2px 2px 10px rgb(2, 8, 19),
            -2px -2px 10px rgb(2,8,19),
            0 0 2px 2px inset rgb(160, 160, 160);
}

form > div {
    display: grid;
    grid-template-columns: 2fr 6fr 1fr;
    width: 100%;
    justify-items: center;
    margin: .2rem auto;
}

form > div:first-child {
    margin-block-start: 1rem;
}

span, fieldset {
    grid-column-start: 2;
}

fieldset {
    justify-self: start;
}

fieldset > label > input {
    width: fit-content;
}

fieldset > label {
    margin-inline-start: .5rem;
}

label, input {
    margin: .5rem .5rem;
    align-self: center;
}

label {
    margin-left: auto;
}

input {
    margin-right: auto;
    width: 90%;
    border: 2px inset black
}
</style>