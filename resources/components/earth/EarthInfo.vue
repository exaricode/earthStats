<template>
    <div id="mainGrid">
        <div id="one" class="subGrid">
            <template v-for="(e) in arrOne">
                <template v-for="(x, key) in e">
                    <EarthInfoSection :title="key"  :info="x" />
                </template>
            </template>
        </div>
        <div id="two" class="subGrid">
            <template v-for="(e) in arrTwo">
                <template v-for="(x, key) in e">
                    <EarthInfoSection :title="key"  :info="x" />
                </template>
            </template>
        </div>
        <div id="three" class="subGrid">
            <template v-for="(e) in arrThree">
                <template v-for="(x, key) in e">
                    <EarthInfoSection :title="key"  :info="x" />
                </template>
            </template>
        </div>
    </div>
</template>

<script setup>
import { ref, onBeforeMount } from 'vue';
import EarthInfoSection from './EarthInfoSection.vue';
import earthInformation from '../../js/classes/earthInfo.js';

const earthInfo = ref(earthInformation);
const arrOne = ref([]);
const arrTwo = ref([]);
const arrThree = ref([]);

onBeforeMount(() => {
    const heightOne = ref(0);
    const heightTwo = ref(0);
    const heightThree = ref(0);
    // loop over earthInfo
    for (const e in earthInfo.value) {
        // check the heights, create new object and set height to index length
        if (heightOne.value <= heightTwo.value && heightOne.value <= heightThree.value){
            let temp = {};
            temp[e] = earthInfo.value[e];
            arrOne.value.push(temp);
            heightOne.value += earthInfo.value[e].length;
        } else if (heightTwo.value <= heightThree.value) {
            let temp = {}
            temp[e] = earthInfo.value[e];
            arrTwo.value.push(temp);
            heightTwo.value += earthInfo.value[e].length;
        } else {
            let temp = {};
            temp[e] = earthInfo.value[e]
            arrThree.value.push(temp);
            heightThree.value += earthInfo.value[e].length;
        }
    }
})
</script>

<style scoped>
#mainGrid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: 1fr;
    margin: .5rem clamp(.2rem, 1vw, 2rem);
    gap: 1rem;
}

.subGrid {
    display: grid;
    grid-template-columns: 1fr;
    grid-auto-rows: max-content;
}
</style>