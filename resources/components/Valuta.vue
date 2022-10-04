<template>
    <div>
        <NavBar />
    </div> 
    <main>
        <ValutaHeader>
            <template #header>Currency converter</template>
            <template #subHeader>Placeholder for subheader</template>
        </ValutaHeader>

        <!--TODO: api exchange rates https://fixer.io/ -->
        <ValutaContainer />
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import ValutaHeader from './valuta/ValutaHeader.vue';
import ValutaContainer from './valuta/ValutaContainer.vue';
</script>

<style scoped>

</style>