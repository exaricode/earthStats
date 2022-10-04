<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <form method="POST" action="/updateCalendarEvent" enctype="multipart/form-data" 
            class="bg-white border-2 border-black border-solid text-center">

            <template v-if="calendarEvent">
                <div>
                    {{ calendarEvent.id }}
                </div>
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
                                checked="calendarEvent.reminder == 'yes'">
                        Yes</label>
                        <label for="updateReminderNo">
                            <input type="radio" name="updateReminder" id="updateReminderNo" 
                            value="no" 
                            :disabled="editReminder"
                            checked="calendarEvent.reminder == 'no'" >
                        No</label>
                    </fieldset>
                    <ButtonInputEdit
                            :editBool="editReminder"
                            @edit-input="(editInput) => editReminder = editInput ? true : false" />
                </div>
                <div>
                    <label for="updateAlarmTime"></label>
                    <input type="number" name="updateAlarmTime" id="updateAlarmTime"
                        v-model="calendarEvent.alarm"
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
    'event-updated', 'event-deleted'
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

function updateEvent(event) {
    editTitle.value = false;
    editDesc.value = false;
    editStartDate.value = false;
    editEndDate.value = false;
    editReminder.value = false;
    editAlarm.value = false; 

    axios.post('updateCalendarEvent', event)
        .then(response => console.log(response));
}

// TODO: focus input
onMounted(() => {
    watchEffect(() => {
        console.log('watcheffect')
        if (inputTitle.value && !editTitle.value) {
            console.log('title ')
            inputTitle.value.focus();
        }
        if(inputDesc.value && !editDesc.value) {
            console.log(inputDesc.value)
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

function deleteEvent(event) {
    axios.post('deleteCalendarEvent', event)
        .then(response => {
            if (response.data == 'Succesfull') {
                emits('event-updated');
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
}

form > div {
    display: grid;
    grid-template-columns: 1fr 4fr 1fr;
    width: 100%;
}

span, fieldset {
    grid-column-start: 2;
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
}
</style>