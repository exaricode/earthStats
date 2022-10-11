<template>
    <div id="mainGrid">
        <div class="subGrid one">
            <template v-for="(e, key, index) in earthInfo" :key="key">
                <template v-if="index % 3 == 0">
                    <EarthInfoSection :title="key" :info="e"></EarthInfoSection>
                </template>
                <template v-else></template>
            </template> 
        </div>
        <div class="subGrid two">
            <template v-for="(e, key, index) in earthInfo" :key="key">
                <template v-if="index % 3 == 1">
                    <EarthInfoSection :title="key" :info="e"></EarthInfoSection>
                </template>
                <template v-else></template>
            </template> 
        </div>
        <div class="subGrid three">
            <template v-for="(e, key, index) in earthInfo" :key="key">
                <template v-if="index % 3 == 2">
                    <EarthInfoSection :title="key" :info="e"></EarthInfoSection>
                </template>
                <template v-else></template>
            </template> 
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import EarthInfoSection from './EarthInfoSection.vue';

onMounted(() => {
    // get the 3 subGrid divs
    let temp = document.querySelectorAll('.subGrid');

    // loop over earthInfo
    for (const e in earthInfo.value) {
        // get the subGrid div with least offsetHeight and assign current item
        temp.forEach(elem => {})
        for(const x in earthInfo.value[e]){
            console.log(earthInfo.value[e][x])
        }
        
    }
    /* document.querySelectorAll('.subGrid').forEach(elem => {
        console.log(elem);
        
    }) */
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
    age: [
        {
            name: 'Age',
            stat: '&plusmn; 4.54 billion years old'
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
    margin: .5rem 1rem;
    gap: .5rem;
}

.subGrid {
    display: grid;
    grid-template-columns: 1fr;
    grid-auto-rows: max-content;
}
</style>