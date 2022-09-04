<template>
    <container-fieldset :legend="title">
        <template #first>
            <div id="clock" :style="sizeObject"
                class="border-2 border-black border-solid m-auto flow-root relative text-center">
                <hr class="absolute bg-black rounded-full m-auto"
                    :style="{width: '5%', height: '5%', top: '47.5%', left: '47.5%'}" />
                <!-- <hr class="absolute h-full w-2 bg-black m-auto"
                    :style="{left: '50%', transform: 'rotateZ(0deg)'}" /> -->
                <span v-for="(h, index) in timeList" 
                    :style="{transform: 'rotateZ(' + rotation * (index) + 'deg)' + 'translate(-50%, -50%)',
                        display: 'block',
                        transformOrigin: 'top', position: 'absolute',
                        width: '10%', height: '100%', top:'50%', left:'50%',
                        marginLeft: '-5%', paddingTop: '2%', boxSizing: 'border-box',
                        paddingLeft: '5%'
                        }" >
                    <i :style="{transform: 'rotateZ(' + -rotation * (index) + 'deg)',
                            display: 'block'}">{{h}}</i>
                </span>
                <div id="second" :style="[hand, second]"
                    ></div>
                <div id="minute" :style="[hand, minute]"
                    ></div>
                <div id="hour" :style="[hand, hour]"
                    ></div>
            </div>
        </template>
    </container-fieldset>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';

import ContainerFieldset from './draggable/ContainerFieldset.vue';

const props = defineProps({
    currentDate: Date,
    timezone: String,
    title: String
});

let secondInterval;
let minuteInterval;
let hourInterval;

const rotation = ref(30);
const sizeObject = ref({
    width: '75.25%',
    height: '80%',
    borderRadius: '100%',
    boxSizing: 'border-box'
});

const second = ref({
    width: '.5px',
    height: '45%',
    left: '49%',
    transform: 'rotateZ(0deg)',
    borderColor: 'red',
});

const minute = ref({
    width: '2.5px',
    height: '40%',
    left: '49%',
    transform: 'rotateZ(0deg)',
    backgroundColor: 'black'
});

const hour = ref({
    width: '2.5px',
    height: '25%',
    left: '49%',
    transform: 'rotateZ(0deg)',
    backgroundColor: 'black'
});

const hand = ref({
    position: 'absolute',
    top: '50%',
    transformOrigin: 'center 0px',
    border: '.5px solid black'
});

const timeList = ref([12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);

onMounted(() => {
    const currentDate = ref(props.currentDate);
    
    if (props.timezone != '') {
        currentDate.value = new Date(currentDate.value.toLocaleString('en-US', { timeZone : props.timezone } ));
    }

    const currentHour = computed(() => currentDate.value.getHours() > 12 ? currentDate.value.getHours() - 12 : currentDate.value.getHours());
    const currentMinute = computed(() => currentDate.value.getMinutes());
    const currentSecond = computed(() => currentDate.value.getSeconds());


    let hourAngle = currentHour.value * 30 + currentMinute.value * 6 / 360 * 30 - 180;
    let minuteAngle = currentMinute.value * 6 - 180;
    let secondAngle = currentSecond.value * 6 - 180;

    second.value.transform = `rotateZ(${secondAngle}deg)`;
    minute.value.transform = `rotateZ(${minuteAngle}deg)`;
    hour.value.transform = `rotateZ(${hourAngle}deg)`;

    secondInterval = setInterval(() => {
        secondAngle += 6;
        // console.log(secondAngle);
        second.value.transform = `rotateZ(${secondAngle}deg)`;
    }, 1000);

    minuteInterval = setInterval(() => {
        minuteAngle += 6;
        minute.value.transform = `rotateZ(${minuteAngle}deg)`;
    }, 1000 * 60);

    hourInterval = setInterval(() => {
        hourAngle += 6;
        hour.value.transform = `rotateZ(${hourAngle}deg)`;
    }, 1000 * 60 * 60);
});

onUnmounted(() => {
    clearInterval(secondInterval);
    clearInterval(minuteInterval);
    clearInterval(hourInterval);
})
</script>

<style scoped>
/* #clock {
  --second: 1s;
  --minute: calc(var(--second) * 60);
  --hour: calc(var(--minute) * 60);
  
} */

/* @keyframes rotate {
  from { transform: rotate(0); }
  to { transform: rotate(1turn); }
}

#second {
  animation: rotate steps(60) var(--minute) infinite;
}

#minute {
    animation: rotate linear var(--hour) infinite;
}

#hour {
    animation: rotate linear calc(var(--hour) * 12) infinite;
} */

#clock > span::before{
    position: absolute;
    top: 50%;
    left: 50%;
    width: 4px;
    height: 4px;
    border-radius: 100%;
    display: block;
    transform: translate(-50%, -50%);
    content: "";
}

</style>