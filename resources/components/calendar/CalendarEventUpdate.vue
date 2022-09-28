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
                        <button-input-edit 
                            :editBool="editTitle"
                            @edit-input="(editInput) => editTitle = editInput ? true : false">
                        </button-input-edit>
                         
                </div>
                <div>
                    <label for="updateDesc">description</label>
                    <input type="text" id="updateDesc" name="updateDesc"
                        ref="inputDesc"
                        :disabled="editDesc"
                        v-model="calendarEvent.desc"
                        @blur="editDesc = editDesc ? false : true" />
                        <button-input-edit
                            :editBool="editDesc"
                            @edit-input="(editInput) => editDesc = editInput ? true : false">
                        </button-input-edit>
                </div>
                <div>
                    <label for="updateStartDate">Start</label>
                    <input type="date" id="updateStartDate" name="updateStartDate"
                        ref="inputStartDate"
                        :disabled="editStartDate"
                        v-model="calendarEvent.start_date" />
                        <button-input-edit
                            :editBool="editStartDate"
                            @edit-input="(editInput) => editStartDate = editInput ? true : false">
                        </button-input-edit>
                </div>
                <div>
                    <label for="updateEndDate">End</label>
                    <input type="date" name="updateEnddate" id="updateEnddate"
                        ref="inputEndDate"
                        :disabled="editEndDate"
                        v-model="calendarEvent.end_date" />
                        <button-input-edit
                            :editBool="editEndDate"
                            @edit-input="(editInput) => editEndDate = editInput ? true : false">
                        </button-input-edit>
                </div>
                <div>
                    Reminder
                    <div>
                    <input type="radio" name="updateReminder" id="updateReminderYes" 
                        value="yes" 
                        :disabled="editReminder" 
                        checked="calendarEvent.reminder == 'yes'">
                    <label for="updateReminderYes">Yes</label>
                    <input type="radio" name="updateReminder" id="updateReminderNo" 
                        value="no" 
                        :disabled="editReminder"
                        checked="calendarEvent.reminder == 'no'" >
                    <label for="updateReminderNo">No</label>
                    </div>
                    <button-input-edit
                            :editBool="editReminder"
                            @edit-input="(editInput) => editReminder = editInput ? true : false">
                        </button-input-edit>
                </div>
                <div>
                    <label for="updateAlarmTime"></label>
                    <input type="number" name="updateAlarmTime" id="updateAlarmTime"
                        v-model="calendarEvent.alarm"
                        :disabeld="editAlarm">
                        <button-input-edit
                            :editBool="editAlarm"
                            @edit-input="(editInput) => editAlarm = editInput ? true : false">
                        </button-input-edit>
                </div>
                <button @click.prevent="updateEvent(calendarEvent)">update</button>
                <button @click.prevent="deleteEvent(calendarEvent)">delete</button>
            </template>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, watchEffect, onMounted } from 'vue';

import ButtonInputEdit from './ButtonInputEdit.vue';

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

function updateEvent(event) {
    editTitle.value = true;
    editDesc.value = true;
    editStartDate.value = true;
    editEndDate.value = true;
    editReminder.value = true;
    editAlarm.value = true; 

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
    width: 75%;
    height: 75%;
    margin: 2rem auto;
    
    
}

form > div {
    display: grid;
    grid-template-columns: 1fr 75% 1fr;
    width: 100%;
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