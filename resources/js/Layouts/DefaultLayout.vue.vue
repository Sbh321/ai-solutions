<template>
    <div class="relative flex min-h-screen flex-col">
        <Header />
        <main class="flex-grow">
            <slot />
        </main>
        <!-- <div
            class="chat-bot cursor-pointer rounded-full border-2 border-black bg-white p-4 shadow-lg"
        >
            <img src="/icons/Bot.svg" alt="Chat Bot" />
        </div> -->
        <Footer />
    </div>
</template>

<script setup>
import Footer from '@/Components/Pages/Layouts/Footer.vue';
import Header from '@/Components/Pages/Layouts/Header.vue';
</script>

<style scoped>
.chat-bot {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 50;
}
.chat-bot img {
    width: 50px;
    height: 50px;
}
</style>
