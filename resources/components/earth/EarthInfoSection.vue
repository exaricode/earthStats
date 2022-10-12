<template>
    <section>
        <h3>{{ title }}</h3>
        <div v-for="i in info" :key="i.name">
            <span v-html="i.name"></span><span v-html="i.stat"></span>
        </div>
    </section>  
</template>

<script setup>

const props = defineProps({
    title: String,
    info: Object
})
</script>

<style scoped>
section {
    width: 100%;
    height: fit-content;
    margin: .5rem auto;
    padding: .5rem 1rem;
    border-radius: 2.5% / 5%;
    box-shadow: -2px -2px 5px 0 rgba(10,10,10,1), 2px 2px 5px 0 rgba(10,10,10,1);
    border: 4px outset rgb(20,20,20);
}

section:hover {
    transform: scale(1.025);
    transition: transform linear .5s;
}

h3 {
    text-align: center;
    font-weight: 600;
    font-size: 2rem;
}

div { 
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: .5rem;
}

span {
    width: 100%;
    font-size: 1.2rem;
    margin: .2rem auto;
}  

span:first-child {
    justify-self: end;
    text-align: end;
    
}
</style>