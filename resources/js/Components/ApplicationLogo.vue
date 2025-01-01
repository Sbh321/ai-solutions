<template>
    <img :src="getImageUrl(websiteInfo.website_logo)" alt="App Logo" />
</template>
<script setup lang="ts">
import axios from 'axios';
import { onMounted, ref } from 'vue';

const websiteInfo = ref({
    website_logo: '',
    location: '',
    email: '',
    phone_number: '',
});

onMounted(() => {
    axios.get('/settings').then((response) => {
        websiteInfo.value = response.data.setting;
        console.log(websiteInfo.value);
    });
});

function getImageUrl(imagePath: string): string {
    if (!imagePath) return '';
    return `${import.meta.env.VITE_APP_URL}/storage/${imagePath}`;
}
</script>
