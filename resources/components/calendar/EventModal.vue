<template>
    <div class="w-full h-full bg-slate-600/50 z-50 absolute">
        <div class="w-fit h-2/3 mx-auto mt-8 bg-white border-2 border-black border-solid
                grid grid-cols-2">
            <label for="title">title</label>
            <input type="text" id="title" name="title" />
            
            <label for="desc">description</label>
            <input type="text" id="desc" name="desc" />
            
            <label for="start_date">Start</label>
            <input type="date" id="start_date" name="start_date" />
            
            <label for="end_date">End</label>
            <input type="date" id="end_date" name="end_date" />
            <div class="col-span-2">
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
                    class="mx-auto">add</button>
            </div>
        </div>
    </div>
</template>

<script setup>

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
    margin-right: ;
}


</style>