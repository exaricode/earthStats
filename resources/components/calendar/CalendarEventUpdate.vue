<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <form method="POST" action="/updateCalendarEvent" enctype="multipart/form-data" 
            class="w-2/3 h-2/3 mx-auto mt-8 bg-white border-2 border-black border-solid text-center">
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
                        @blur="editTitle = false" />
                         <button @click.prevent.self="editTitle = !editTitle"
                            :inner-text="editTitle.value ? 'edit' : 'done'">
                            {{ editTitle ? 'edit' : 'done' }}
                        </button>
                         
                </div>
                <div>
                    <label for="updateDesc">description</label>
                    <input type="text" id="updateDesc" name="updateDesc"
                        ref="inputDesc"
                        :disabled="editDesc"
                        v-model="calendarEvent.desc" />
                        <button @click.prevent.self="editDesc = !editDesc">edit</button>
                </div>
                <div>
                    <label for="updateStartDate">Start</label>
                    <input type="date" id="updateStartDate" name="updateStartDate"
                        
                        :disabled="editStartDate"
                        v-model="calendarEvent.start_date" />
                        <button @click.prevent.self="editStartDate = !editStartDate">edit</button>
                </div>
                <div>
                    <label for="updateEndDate">End</label>
                    <input type="date" name="updateEnddate" id="updateEnddate"
                        :disabled="editEndDate"
                        v-model="calendarEvent.end_date" />
                    <button @click.prevent.self="editEndDate = !editEndDate">edit</button>
                </div>
                <div>
                    <p>Reminder 
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
                    <button @click.prevent.self="editReminder = !editReminder">edit</button>
                </p>
                </div>
                <div>
                    <label for="updateAlarmTime"></label>
                    <input type="number" name="updateAlarmTime" id="updateAlarmTime"
                        v-model="calendarEvent.alarm"
                        :disabeld="editAlarm">
                    <button @click.prevent.self="editAlarm != editAlarm">edit</button>
                </div>
                <button @click.prevent="updateEvent">update</button>
                <button @click.prevent="deleteEvent(calendarEvent)">delete</button>
            </template>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref, watchEffect } from 'vue';

const props = defineProps({
    calendarEvent: Object
});

const emits = defineEmits([
    'event-updated', 'event-deleted'
])

// input refs
const inputTitle = ref(null);
const inputDesc = ref(null);

// input disabled bool
const editTitle = ref(true);
const editDesc = ref(true);
const editStartDate = ref(true);
const editEndDate = ref(true);
const editReminder = ref(true);
const editAlarm = ref(true);

function updateEvent() {
    editTitle.value = false;
    editDesc.value = false;
    editStartDate.value = false;
    editEndDate.value = false;
    editReminder.value = false;
    editAlarm.value = false; 
}

watchEffect(() => {
    if (inputTitle.value && !editTitle.value) {
        inputTitle.value.focus();
    }
    if(!editDesc.value) {
        inputDesc.value.focus();
    }
})

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

</style>