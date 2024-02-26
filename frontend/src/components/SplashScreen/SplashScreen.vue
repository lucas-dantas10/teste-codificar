<script setup>
import Splash from '../../assets/splash_logo.png';
import { ref, onMounted } from 'vue';

const props = defineProps({
    isLoading: {
        type: Boolean,
    }
});

const showSplashScreen = ref(false);

onMounted(() => {
    const lastVisit = localStorage.getItem('lastVisit');
    const currentTime = new Date().getTime();
    const fiveMinutesInMillis = 60 * 1000;

    if (!lastVisit || currentTime - parseInt(lastVisit) > fiveMinutesInMillis) {
        showSplashScreen.value = true;
        localStorage.setItem('lastVisit', currentTime.toString());
    }
});
</script>

<template>
    <div  v-if="showSplashScreen" class="z-50" :class="{ loader: true, fadeout: !isLoading }">
        <div class="flex items-center justify-center w-full h-full">
            <img :src="Splash" alt="Splash Screen" class="splash-logo w-[500px]">
        </div>
    </div>
  </template>
  
  <style>
  .loader {
    background: rgb(111,22,147);
    background: linear-gradient(0deg, rgba(111,22,147,1) 0%, rgba(97,30,158,1) 16%, rgba(32,6,105,1) 57%, rgba(0,0,0,1) 100%);
    bottom: 0;
    color: white;
    display: block;
    font-size: 32px;
    left: 0;
    overflow: hidden;
    padding-top: 10vh;
    position: fixed;
    right: 0;
    text-align: center;
    top: 0;
  }
  
  .fadeout {
    animation: fadeout 4s forwards;
  }

  .splash-logo {
    transition: transform 6s;
}
  
  @keyframes fadeout {
    to {
      opacity: 0;
      visibility: hidden;
      transform: scale(2); /* Aumenta o tamanho da logo */
    }
  }
  </style>