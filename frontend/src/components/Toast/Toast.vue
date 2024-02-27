<script setup>
import { computed } from 'vue';
import store from '../../store';

const toast = computed(() => {
    return store.state.toast;
});

</script>

<template>
    <div
        id="toast-simple"
        class="absolute z-30 mt-2 mr-2 right-0 flex items-center w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
        role="alert"
        v-show="toast.message != ''"
    >
        <div class="ps-4 text-sm font-normal text-lg">{{ toast.message }}</div>
    </div>
</template>
