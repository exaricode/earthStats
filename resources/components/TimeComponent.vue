<template>
    <container-fieldset :legend="'Current Time'">
        <template #first>
            <div :style="sizeObject"
                class="border-2 border-black border-solid m-auto flow-root relative">
                <div id="second" :style="{width:'50%', top:'50%',
                                    left:'calc(50% - 5%)',
                                    transformOrigin:'center 0'
                                    }"
                    class="border-2 border-black border-solid
                        absolute"></div>
                <div id="minute" :style="{width:'25%', top:'50%',
                                    left:'calc(50% - 5%)',
                                    transformOrigin:'center 0'
                                    }"
                    class="border-2 border-black border-solid
                        absolute"></div>
                <div id="hour" :style="{width:'50%', top:'50%',
                                    left:'calc(50% - 5%)',
                                    transformOrigin:'center 0'
                                    }"
                    class="border-2 border-black border-solid
                        absolute"></div>
            </div>
        </template>
    </container-fieldset>
</template>

<script setup>
import { ref } from 'vue';

import ContainerFieldset from './draggable/ContainerFieldset.vue';

const sizeObject = ref({
    width: '80%',
    height: '80%',
    borderRadius: '100%'
})

</script>

<style scoped>
:root {
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
</style>