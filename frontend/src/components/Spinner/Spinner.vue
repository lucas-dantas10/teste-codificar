<script setup>
import { ref, computed } from 'vue';
import store from '../../store';

const isLoading = computed(() => store.state.spinner.isLoading);
</script>

<template>
    <svg v-if="isLoading" class="animate-spin border border-white rounded-full h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
    <!-- ... -->
    </svg>
</template>
