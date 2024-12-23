<script setup lang="ts">
import EventCard from '@/Components/Pages/Events/EventCard.vue';
import FocusCard from '@/Components/Pages/Focus/FocusCard.vue';
import TestimonialsCard from '@/Components/Pages/Testimonials/TestimonialsCard.vue';
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Define the types for the props
interface Props {
    canLogin: boolean;
    canRegister: boolean;
}

// Define props using `defineProps` and type it with the `Props` interface
defineProps<Props>();

// Testimonials data
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

<template>
    <DefaultLayoutVue>
        <Head title="Welcome" />

        <!-- Intro Section -->
        <div class="flex h-screen flex-col">
            <!-- Hero Section -->
            <div
                class="relative flex-grow bg-center"
                style="background-image: url('/images/background/welcome.png')"
            >
                <!-- White opaque veil -->
                <div class="absolute inset-0 bg-white bg-opacity-60"></div>

                <!-- Centered content -->
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center gap-14"
                >
                    <p class="max-w-[800px] text-center text-6xl font-bold">
                        Revolutionizing Technology, One Solution at a Time.
                    </p>
                    <button
                        class="rounded-xl bg-gray-700 px-8 py-2 text-white hover:bg-gray-800"
                    >
                        Discover
                    </button>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="bg-[#F4F7FF]">
            <div class="container py-20">
                <div class="md:flex">
                    <div class="w-1/2">
                        <p class="mb-8 text-4xl font-bold">About Us</p>

                        <p class="text-[#626262]">
                            AI-Solutions, based in Sunderland, transforms the
                            digital employee experience with innovative
                            AI-driven software. We specialize in:
                        </p>

                        <ul class="mb-4 list-inside list-disc text-[#626262]">
                            <li>
                                AI-powered virtual assistants for real-time
                                support and affordable prototyping solutions.
                            </li>

                            <li>
                                Proactively solving workplace challenges to
                                enhance productivity and satisfaction.
                            </li>
                        </ul>

                        <button
                            class="mt-4 rounded-lg border border-gray-700 px-4 py-2 text-gray-700 transition duration-300 ease-in-out hover:bg-gray-700 hover:text-white"
                        >
                            Learn More
                        </button>
                    </div>
                    <div class="flex w-1/2 items-center justify-center">
                        <img
                            src="/images/about.png"
                            alt=""
                            class="max-w-[500px]"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Focus area section -->
        <div class="container py-20">
            <p class="mb-8 text-4xl font-bold">Our Focus Areas</p>

            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
                <FocusCard
                    v-for="card in [
                        {
                            title: 'AI-Driven Software Solutions ',
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
                            title: 'Digital Employee Experience',
                            image: '/images/temp/focus_4.png',
                        },
                        {
                            title: 'Digital Employee Experience',
                            image: '/images/temp/focus_5.png',
                        },
                        {
                            title: 'Digital Employee Experience',
                            image: '/images/temp/focus_6.png',
                        },
                    ]"
                    :card="card"
                    :key="card.title"
                />
            </div>
        </div>

        <!-- Events section -->
        <div class="container py-20">
            <p class="mb-2 text-4xl font-bold">Events for you</p>
            <p class="mb-8 text-[#626262]">
                Don't miss out - explore what's coming up!
            </p>

            <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
                <EventCard
                    v-for="card in [
                        {
                            title: 'AI-Driven Software Solutions ',
                            image: '/images/temp/event_1.png',
                            location: 'Sunderland',
                            date: '12th August 2021',
                            time: '10:00 AM',
                        },
                        {
                            title: 'AI-Powered Virtual Assistants',
                            image: '/images/temp/event_2.png',
                            location: 'Sunderland',
                            date: '12th August 2021',
                            time: '10:00 AM',
                        },
                        {
                            title: 'Digital Employee Experience',
                            image: '/images/temp/event_3.png',
                            location: 'Sunderland',
                            date: '12th August 2021',
                            time: '10:00 AM',
                        },
                    ]"
                    :card="card"
                    :key="card.title"
                />
            </div>

            <div class="mt-4 flex w-full justify-center">
                <button
                    class="mt-4 rounded-lg border border-gray-700 px-4 py-2 text-gray-700 transition duration-300 ease-in-out hover:bg-gray-700 hover:text-white"
                >
                    View All Events
                </button>
            </div>
        </div>

        <!-- Testimonials from the client -->

        <div class="bg-[#F4F7FF]">
            <div class="container py-20">
                <p class="mb-8 text-4xl font-bold">Hear from our clients</p>
                <div class="md:flex">
                    <div class="flex w-1/3 items-center justify-center">
                        <img
                            src="/graphics/testimonials.svg"
                            alt=""
                            class="max-w-[500px]"
                        />
                    </div>
                    <div class="flex w-2/3 items-center justify-center">
                        <div class="grid grid-cols-1 gap-4">
                            <!-- Animated Transition -->
                            <transition :name="transitionName" mode="out-in">
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

<style scoped>
.custom-list li::marker {
    font-size: 0.75rem; /* Decreases the bullet size */
}

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
