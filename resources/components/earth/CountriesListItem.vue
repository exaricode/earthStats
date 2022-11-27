<template>
    <li><span>{{name}}</span><hr /><span>{{value}}</span></li>
</template>

<script setup>
defineProps({
    name: String,
    value: String
})
</script>

<style scoped>
li {
    padding: .2rem;
}

li > span:first-of-type{
    padding-inline-end: .2rem;
    display: block;
    text-align: center;
}

hr {
    height: .3rem;
    background-image: linear-gradient(white, black, white);
    border-radius: 100% / 100%;
    border: none;
}
li > span:last-of-type {
    padding-inline-start: .2rem;

}
</style>
