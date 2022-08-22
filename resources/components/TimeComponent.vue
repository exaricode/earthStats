<template>
    <container-fieldset :legend="'Current Time'">
        <template #first>
            <div id="clock" :style="sizeObject"
                class="border-2 border-black border-solid m-auto flow-root relative text-center">
                <span v-for="(h, index) in timeList" 
                    :style="{transform: 'rotateZ(' + rotation * (index) + 'deg)' + 'translate(-50%, -50%)',
                        
                        display: 'block',
                        transformOrigin: 'top', position: 'absolute',
                        width: '20px', height: '100%', top:'50%', left:'50%',
                        marginLeft: '-5%', paddingTop: '4%', boxSizing: 'border-box'
                        }" >
                    <i :style="{transform: 'rotateZ(' + -rotation * (index) + 'deg)',
                            display: 'block'}">{{h}}</i>
                </span>
                <div id="second" :style="[hand, second]"
                    class="border-2 border-black border-solid
                        absolute"></div>
                <div id="minute" :style="[hand, minute]"
                    class="border-2 border-black border-solid
                        absolute"></div>
                <div id="hour" :style="[hand, hour]"
                    class="border-2 border-black border-solid
                        absolute"></div>
            </div>
        </template>
    </container-fieldset>
</template>

<script setup>
import { ref } from 'vue';

import ContainerFieldset from './draggable/ContainerFieldset.vue';

const rotation = ref(30);
const sizeObject = ref({
    width: '80%',
    height: '80%',
    borderRadius: '100%'
});

const second = ref({
    width: '5px',
    height: '45%',
    backgroundColor: 'bg-blue-300',
    left: 'calc(50% - 5px)'
});

const minute = ref({
    width: '10px',
    height: '40%',
    backgroundColor: 'bg-red-300',
    left: 'calc(50% - 10px)'
});

const hour = ref({
    width: '10px',
    height: '25%',
    backgroundColor: 'bg-green-300',
    left: 'calc(50% - 10px)'
});

const hand = ref({
    position: 'absolute',
    top: '50%',
    transformOrigin: 'center 0px'
});

const timeList = ref([12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);


</script>

<style scoped>
#clock {
  --second: 1s;
  --minute: calc(var(--second) * 60);
  --hour: calc(var(--minute) * 60);
  
}

@keyframes rotate {
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
}

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