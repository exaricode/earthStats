<template>
    <div>
        <NavBar />
    </div>
    <main>
        <div>
           <div id="earth">
            <img src="../images/earth.png" />
            </div>
            <div id="moon">
                <img src="../images/moon.png" />
            </div> 
        </div>
    </main>
</template>

<script setup>
import NavBar from './navigation/NavBar.vue';

</script>

<style scoped>
main > div {
    display: flow-root;
    position: relative;
    background: #000 url('../images/space2.jpg') repeat center;
    background-size: cover;
    height: 25rem;
    width: 100vw;
}

#earth {
    position: absolute;
    width: 15%;
    top: 7.5rem;
    left: 40%;
    border-radius: 50%;
}

@keyframes turn {
    to {
        transform: rotateZ(360deg);
    }
}

#moon {
    position: absolute;
    width: 2.5%;
    top: 10rem;
    left: 50%;
    border-radius: 50%;
    transform-origin: 10px;
    animation: turn 10s linear 0s infinite normal;
}

#moon > img {
    transform: translateX(-160px) translateY(-100px);
}


</style>