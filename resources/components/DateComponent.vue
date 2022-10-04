<template>
    <div>
        <ContainerFieldset :legend="'Current Date'">
            <template #first>
                <div> {{ day }} </div>
            
                <div> {{ today + ' ' + month + ' ' + year}} </div>
            </template>
        </ContainerFieldset>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import ContainerHeader from './draggable/ContainerHeader.vue';
import ContainerFieldset from './draggable/ContainerFieldset.vue';

const currentDate = new Date();

const day = computed(() => { 
    const d = currentDate.getDay();
    return d === 1 ? 'Monday' : d === 2 ? 'Thuesday' : d === 3 ? 'Wednesday' :
        d === 4 ? 'Thursday' : d === 5 ? 'Friday' : d === 6 ? 'Saturday' : 'Sunday'
});

const today = computed(() => currentDate.getDate());
const month = computed(() => {
    const m = currentDate.getMonth()
    return m === 0 ? 'Januari' : m === 1 ? 'Februari' : m === 2 ? 'March' :
        m === 3 ? 'April' : m === 4 ? 'May' : m === 5 ? 'June' : 
        m === 6 ? 'July' : m === 7 ? 'August' : m === 8 ? 'September' :
        m === 9 ? 'October' : m === 10 ? 'November' : 'December'
});

const year = computed(() => currentDate.getFullYear());
    
</script>

<style lang="scss" scoped>

</style>