<template>
    <div>
        <NavBar />
    </div>
    <main class="flex flex-wrap">
        <DragContainer>
            <TimeComponent :timezone="''"
                            :title="'Local Time'" />
        </DragContainer>
        <DragContainer>
            <TimeComponent :title="'New York'"
                            :timezone="'America/New_York'" />
        </DragContainer>
        <DragContainer>
            <TimeComponent :title="'London'"
                            :timezone="'Europe/London'" />
        </DragContainer>
        <DragContainer>
            <TimeComponent :title="'Tokyo'"
                            :timezone="'Asia/Tokyo'" />
        </DragContainer>
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';
import DragContainer from './draggable/DragContainer.vue';
import TimeComponent from './TimeComponent.vue';

</script>

<style lang="scss" scoped>

</style>