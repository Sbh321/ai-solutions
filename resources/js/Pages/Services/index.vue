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
                    <p class="max-w-[800px] text-center text-6xl font-bold">
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

        <div class="container py-20">
            <p class="mb-8 text-4xl font-bold">AI driven Software Solutions</p>

            <p class="text-[#626262]">
                Our AI-driven software solutions are designed to revolutionize
                workplace efficiency and innovation. By leveraging cutting-edge
                artificial intelligence, we help businesses automate repetitive
                tasks, analyze complex data, and enhance employee productivity.
                These solutions are tailored to meet specific industry needs,
                enabling faster problem-solving, smarter decision-making, and
                seamless digital transformation. Empower your organization with
                intelligent tools that drive results and support a
                forward-thinking approach to workplace challenges.
            </p>

            <br />

            <p class="text-[#626262]">Key Features and Benefits:</p>
            <ul class="mb-4 list-inside list-disc text-[#626262]">
                <li>
                    Proactively solving workplace challenges to enhance
                    productivity and satisfaction.
                </li>

                <li>
                    AI-powered virtual assistants for real-time support and
                    affordable prototyping solutions.
                </li>
            </ul>
        </div>

        <div class="container py-10">
            <p class="mb-8 text-4xl font-bold">AI driven Software Solutions</p>

            <Swiper
                :modules="modules"
                :loop="true"
                :slides-per-view="1"
                navigation
                class="custom-swiper"
            >
                <SwiperSlide
                    v-for="(slide, index) in slides"
                    :key="index"
                    class="px-20"
                >
                    <div class="flex items-center justify-center gap-12">
                        <div class="w-2/3">
                            <p class="mb-2 text-3xl font-bold">
                                {{ slide.title }}
                            </p>
                            <p class="text-[#626262]">
                                {{ slide.description }}
                            </p>
                        </div>
                        <div class="flex w-1/3 items-center justify-center">
                            <img
                                :src="slide.image"
                                alt="Focus Image"
                                class="w-full rounded-md"
                            />
                        </div>
                    </div>
                </SwiperSlide>
            </Swiper>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import FocusCard from '@/Components/Pages/Focus/FocusCard.vue';
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import { Navigation, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';

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

const slides = [
    {
        title: 'Innovative Technology',
        description:
            'Innovative technology in AI refers to the use of advanced tools and methods to transform financial services. This includes blockchain for secure transactions, artificial intelligence for personalized financial insights, and automation to streamline processes. By leveraging innovation, we ensure faster, smarter, and more efficient solutions tailored to meet modern business needs',
        image: '/images/temp/services_1.png',
    },
    {
        title: 'Explore Opportunities',
        description:
            'Unlock opportunities by harnessing the power of AI. Gain insights...',
        image: '/images/temp/focus_2.png',
    },
];

const modules = [Navigation, Pagination];
</script>

<style scoped>
::v-deep(.custom-swiper .swiper-button-next),
::v-deep(.custom-swiper .swiper-button-prev) {
    color: grey;
}

::v-deep(.custom-swiper .swiper-button-next::after),
::v-deep(.custom-swiper .swiper-button-prev::after) {
    font-size: 25px;
}

::v-deep(.custom-swiper .swiper-button-next:hover),
::v-deep(.custom-swiper .swiper-button-prev:hover) {
    color: darkgrey;
}
</style>
