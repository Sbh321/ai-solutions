<template>
    <div class="flex min-h-screen flex-col">
        <Header />
        <main class="flex-grow">
            <slot />
        </main>
        <Footer />
    </div>
</template>

<script setup>
import Footer from '@/Components/Pages/Layouts/Footer.vue';
import Header from '@/Components/Pages/Layouts/Header.vue';
</script>

<style scoped>
/* Add custom styles if needed */
</style>
