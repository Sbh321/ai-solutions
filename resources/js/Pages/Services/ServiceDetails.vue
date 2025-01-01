<template>
    <DefaultLayoutVue>
        <Head title="Service Details" />

        <div class="container py-20">
            <p class="mb-8 text-4xl font-bold">
                {{ service.title }}
            </p>

            <p class="text-[#626262]">
                {{ service.description }}
            </p>
        </div>

        <div class="container py-10">
            <p class="mb-8 text-4xl font-bold">
                Why to choose us for AI driven Solutions
            </p>

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
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import { Navigation, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';

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
            'Discover the vast opportunities AI offers for businesses across various sectors. By utilizing AI, companies can analyze vast amounts of data to uncover trends, enhance customer experiences, and make data-driven decisions. AI opens up new avenues for growth, from automating repetitive tasks to predicting market shifts and improving operational efficiency. Embrace AI-driven innovation to stay ahead of competitors, optimize resources, and unlock new revenue streams, making your business more agile and future-ready.',
        image: '/images/temp/focus_2.png',
    },
];

interface Service {
    title: string;
    description: string;
}

defineProps<{ service: Service }>();

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
