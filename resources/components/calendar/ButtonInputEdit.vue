<template>
    <button @click.prevent.self="clickButton">
        {{ editBool ? 'edit' : 'done'}}
    </button>   
</template>

<script setup>

const props = defineProps({
    editBool: Boolean,
});

const emits = defineEmits(['edit-input']);

function clickButton() {
    emits('edit-input', !props.editBool ? true : false);
}
</script>

<style scoped>
button {
    background-color: rgba(100,100,100, .8);
    padding: .2rem 1rem;
    margin-inline-end: 1rem;
    border-radius: 10% 5% / 5% 10%;
}

button:hover {
    background-color: rgba(50,50,50, .8);
}
</style>