<template>
    <DefaultLayoutVue>
        <Head title="Events" />

        <!-- Intro Section -->
        <div class="flex h-screen flex-col">
            <!-- Hero Section -->
            <div
                class="relative flex-grow bg-center"
                style="background-image: url('/images/background/events.png')"
            >
                <!-- White opaque veil -->
                <div class="absolute inset-0 bg-white bg-opacity-60"></div>

                <!-- Centered content -->
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center gap-14"
                >
                    <p class="max-w-[800px] text-center text-6xl font-bold">
                        Our Events
                    </p>
                </div>
            </div>
        </div>

        <div class="container py-20">
            <p class="mb-8 text-4xl font-bold">Upcoming events</p>

            <div class="mx-auto grid max-w-[800px] grid-cols-1 gap-8">
                <EventCardLandscape
                    v-for="card in [
                        {
                            title: 'AI-Driven Software Solutions ',
                            image: '/images/temp/event_1.png',
                            location: 'Sunderland',
                            date: '12th August 2021',
                            smallDate: 'Aug, 12',
                            time: '10:00 AM',
                        },
                        {
                            title: 'AI-Powered Virtual Assistants',
                            image: '/images/temp/event_2.png',
                            location: 'Sunderland',
                            date: '12th August 2021',
                            smallDate: 'Aug, 12',
                            time: '10:00 AM',
                        },
                        {
                            title: 'Digital Employee Experience',
                            image: '/images/temp/event_3.png',
                            location: 'Sunderland',
                            date: '12th August 2021',
                            smallDate: 'Aug, 12',
                            time: '10:00 AM',
                        },
                    ]"
                    :card="card"
                    :key="card.title"
                />
            </div>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import EventCardLandscape from '@/Components/Pages/Events/EventCardLandscape.vue';
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';
</script>
