<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <div class="w-2/3 h-2/3 mx-auto mt-8 bg-white border-2 border-black border-solid text-center">
            <template v-if="calendarEvent">
                <div>
                    {{ calendarEvent.id }}
                </div>
                <div>
                    {{ calendarEvent.title }}
                </div>
                <div>
                    {{ calendarEvent.desc }}
                </div>
                <div>
                    {{ calendarEvent.start_date }}
                </div>
                <div>
                    {{ calendarEvent.end_date }}
                </div>
                <div>
                    {{ calendarEvent.reminder }}
                </div>
                <div>
                    {{ calendarEvent.alarm }}
                </div>
                <button>update</button>
                <button>delete</button>
            </template>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';

const props = defineProps({
    calendarEvent: Object
})

function deleteEvent(event) {
    axios.post('deleteCalendarEvent', event);
}
</script>

<style scoped>

</style>