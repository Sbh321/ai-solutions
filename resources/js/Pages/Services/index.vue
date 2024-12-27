<template>
    <DefaultLayoutVue>
        <Head title="Services" />

        <!-- Intro Section -->
        <div class="flex h-screen flex-col">
            <!-- Hero Section -->
            <div
                class="relative flex-grow bg-center"
                style="background-image: url('/images/background/services.png')"
            >
                <div class="absolute inset-0 bg-white bg-opacity-60"></div>
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center gap-14"
                >
                    <p
                        class="max-w-[800px] text-center text-6xl font-bold text-[#00133D]"
                    >
                        Services
                    </p>
                </div>
            </div>
        </div>

        <div class="container py-10">
            <p class="mb-8 text-4xl font-bold">Our Focus Areas</p>

            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
                <FocusCard
                    v-for="card in focusCards"
                    :card="card"
                    :key="card.title"
                />
            </div>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import FocusCard from '@/Components/Pages/Focus/FocusCard.vue';
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';

const focusCards = [
    {
        title: 'AI-Driven Software Solutions',
        image: '/images/temp/focus_1.png',
    },
    {
        title: 'AI-Powered Virtual Assistants',
        image: '/images/temp/focus_2.png',
    },
    {
        title: 'Digital Employee Experience',
        image: '/images/temp/focus_3.png',
    },
    {
        title: 'Innovative AI Solutions',
        image: '/images/temp/focus_4.png',
    },
    {
        title: 'AI-Driven Insights',
        image: '/images/temp/focus_5.png',
    },
    {
        title: 'Smart AI Tools',
        image: '/images/temp/focus_6.png',
    },
];
</script>
