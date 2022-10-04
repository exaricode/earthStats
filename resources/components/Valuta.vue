<template>
    <div>
        <nav-bar></nav-bar>
    </div> 
    <main>
        <valuta-header>
            <template #header>Currency converter</template>
            <template #subHeader>Placeholder for subheader</template>
        </valuta-header>

        <!--TODO: api exchange rates https://fixer.io/ -->
        <valuta-container>
        </valuta-container>
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import ValutaHeader from './valuta/ValutaHeader.vue';
import ValutaContainer from './valuta/ValutaContainer.vue';
</script>

<style scoped>

</style>