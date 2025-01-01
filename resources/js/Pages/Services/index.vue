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
                    class="absolute inset-0 mb-24 flex flex-col items-center justify-center gap-14"
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

        <div class="bg-[#F4F7FF]">
            <div class="container py-20">
                <p class="mb-8 text-4xl font-bold">Hear from our clients</p>
                <div class="md:flex">
                    <div class="flex items-center justify-center md:w-1/3">
                        <img
                            src="/graphics/testimonials.svg"
                            alt=""
                            class="max-w-[500px]"
                        />
                    </div>
                    <div class="flex items-center justify-center md:w-2/3">
                        <div class="grid grid-cols-1 gap-4">
                            <!-- Animated Transition -->
                            <transition
                                :name="transitionName"
                                mode="out-in"
                                class="w-full"
                            >
                                <!-- Display the active testimonial -->
                                <TestimonialsCard
                                    :card="testimonials[activeIndex]"
                                    :key="testimonials[activeIndex].name"
                                />
                            </transition>

                            <!-- Navigation Arrows -->
                            <div class="flex items-center justify-end gap-4">
                                <img
                                    src="/icons/CircleArrowLeft.svg"
                                    alt="Previous"
                                    class="cursor-pointer"
                                    @click="prevTestimonial"
                                />
                                <img
                                    src="/icons/CircleArrowRight.svg"
                                    alt="Next"
                                    class="cursor-pointer"
                                    @click="nextTestimonial"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import FocusCard from '@/Components/Pages/Focus/FocusCard.vue';
import TestimonialsCard from '@/Components/Pages/Testimonials/TestimonialsCard.vue';
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

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

interface Testimonial {
    feedback: string;
    name: string;
}

const testimonials: Testimonial[] = [
    {
        feedback:
            'AI-Solutions has been a game-changer for our business. Their AI-driven software solutions have helped us streamline our operations and improve our customer service.',
        name: 'John Doe',
    },
    {
        feedback:
            'AI-Solutions has exceeded our expectations. Their innovative AI tools have significantly boosted our efficiency.',
        name: 'Jane Smith',
    },
    {
        feedback:
            'The team at AI-Solutions is outstanding. Their AI solutions have transformed how we operate daily.',
        name: 'Michael Johnson',
    },
];

// Currently active testimonial index
const activeIndex = ref<number>(0);
const transitionName = ref<string>('slide-right');

// Methods
const prevTestimonial = () => {
    transitionName.value = 'slide-left';
    activeIndex.value =
        activeIndex.value === 0
            ? testimonials.length - 1
            : activeIndex.value - 1;
};

const nextTestimonial = () => {
    transitionName.value = 'slide-right';
    activeIndex.value =
        activeIndex.value === testimonials.length - 1
            ? 0
            : activeIndex.value + 1;
};
</script>

<style scoped>
/* Slide to the right animation */
.slide-right-enter-active {
    animation: slide-right-in 0.5s forwards;
}
.slide-right-leave-active {
    animation: slide-right-out 0.5s forwards;
}

@keyframes slide-right-in {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slide-right-out {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(-100%);
        opacity: 0;
    }
}

/* Slide to the left animation */
.slide-left-enter-active {
    animation: slide-left-in 0.5s forwards;
}
.slide-left-leave-active {
    animation: slide-left-out 0.5s forwards;
}

@keyframes slide-left-in {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slide-left-out {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}
</style>
