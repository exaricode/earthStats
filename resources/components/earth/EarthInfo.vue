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
import { ref, onMounted, h } from 'vue';
import EarthInfoSection from './EarthInfoSection.vue';

const arrOne = ref([]);
const arrTwo = ref([]);
const arrThree = ref([]);
onMounted(() => {
    // get the 3 subGrid divs
    const subGridOne = ref(document.getElementById('one'));
    const subGridTwo = ref(document.getElementById('two'));
    const subGridThree = ref(document.getElementById('three'));

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

const earthInfo = ref({
    measurements: [
        {
            name: 'Radius',
            stat: '6.371km'
        },
        {
            name: 'Surface',
            stat: '510,000,000 km<sup>2</sup>'
        },
        {
            name: 'Volume',
            stat: '1,000,000,000,000 km<sup>3</sup>'
        }
    ],
    rotation: [
        {
            name: 'Earth spin',
            stat: '1600 km/h'
        },
        {
            name: 'Length of day',
            stat: '23h 56min 4sec'
        }
    ], 
    age: [
        {
            name: 'Age',
            stat: '&plusmn; 4.54 billion years old'
        }
    ],   
    distance: [
        {
            name: 'To the moon',
            stat: '384.400 km'
        },
        {
            name: 'To the sun',
            stat: '149,600,000 km'
        }
    ],
    water: [
        {
            name: 'Total',
            stat: '70% of the surface'
        },
        {
            name: 'Salt water',
            stat: '97%'
        },
        {
            name: 'Fresh water',
            stat: '3%'
        }
    ],
    layers: [
        {
            name: 'Crust',
            stat: '0 - 35 km'
        },
        {
            name: 'Mantle',
            stat: '35 - 2,890 km'
        },
        {
            name: 'Core',
            stat: '2,890 - 6,360 km'
        }
    ],
    temperature: [
        {
            name: 'Core temperature',
            stat: '5,500 <sup>o</sup>C'
        },
        {
            name: 'Surface',
            stat: '-88 to 58 <sup>o</sup>C'
        }
    ],
    shape: [
        {
            name: 'Shape',
            stat: 'Oblate Spheroid'
        },
        {
            name: 'Semi-major axis',
            stat: '6,378,137.0 m'
        },
        {
            name: 'Semi-minor axis',
            stat: '6,356,752.3 m'
        }
    ]
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