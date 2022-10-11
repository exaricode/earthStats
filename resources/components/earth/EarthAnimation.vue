<template>
    <div>
        <div id="earthContainer">
            <img src="../../images/earth.png" />
        </div>
        <div id="moon">
            <img src="../../images/moon.png" />
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
main > div {
    display: flow-root;
    position: relative;
    background: #000 url('../../images/space2.jpg') repeat center;
    background-size: cover;
    height: 25rem;
    width: 100vw;
}

#earthContainer {
    position: absolute;
    width: 200px;
    top: 6.9rem;
    left: 45%;
    border-radius: 50%;
}

@keyframes turn {
    to {
        transform: rotateZ(360deg);
    }
}

#moon {
    position: absolute;
    width: 50px;
    top: 11.5rem;
    left: 49.5%;
    border-radius: 50%;
    transform-origin: 10px;
    animation: turn 5s linear 0s infinite normal;
}

#moon > img {
    transform: translateX(-150px) translateY(-75px);
}
</style>