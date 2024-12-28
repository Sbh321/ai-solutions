<template>
    <DefaultLayoutVue>
        <Head title="About" />

        <!-- Intro Section -->
        <div class="flex h-screen flex-col">
            <!-- Hero Section -->
            <div
                class="relative flex-grow bg-center"
                style="background-image: url('/images/background/about.png')"
            >
                <!-- White opaque veil -->
                <div class="absolute inset-0 bg-white bg-opacity-60"></div>

                <!-- Centered content -->
                <div
                    class="absolute inset-0 mb-24 flex flex-col items-center justify-center gap-14"
                >
                    <p
                        class="max-w-[800px] text-center text-6xl font-bold text-[#00133D]"
                    >
                        About Us
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-[#F4F7FF]">
            <div class="container py-20">
                <div class="items-center md:flex">
                    <div class="md:w-1/2">
                        <p class="mb-8 text-4xl font-bold">
                            Innovating Workplaces, One Solution at a Time
                        </p>

                        <p class="text-[#626262]">
                            AI-Solutions, based in Sunderland, transforms the
                            digital employee experience with innovative
                            AI-driven software.
                        </p>
                        <p class="text-[#626262]">We specialize in:</p>

                        <ul class="mb-4 list-inside list-disc text-[#626262]">
                            <li>
                                Proactively solving workplace challenges to
                                enhance productivity and satisfaction.
                            </li>

                            <li>
                                AI-powered virtual assistants for real-time
                                support and affordable prototyping solutions.
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center justify-center md:w-1/2">
                        <img
                            src="/images/about.png"
                            alt=""
                            class="max-w-[500px]"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-20">
            <div class="md:flex">
                <div class="flex items-center justify-center md:w-1/2">
                    <img
                        src="/images/about-2.png"
                        alt=""
                        class="max-w-[500px]"
                    />
                </div>
                <div class="flex items-center justify-center md:w-1/2">
                    <ul class="list-inside list-disc text-[#626262]">
                        <li class="mb-4">
                            <span class="font-bold">Who We Are:</span>
                            A Sunderland-based start-up transforming digital
                            workplaces with AI-driven solutions.
                        </li>
                        <li class="mb-4">
                            <span class="font-bold">What we do:</span>
                            Deliver innovative tools to enhance employee
                            experiences and productivity.
                        </li>
                        <li class="mb-4">
                            <span class="font-bold">Our Unique Edge:</span>
                            An AI-powered virtual assistant offering real-time
                            support and affordable prototyping solutions.
                        </li>
                        <li class="mb-4">
                            <span class="font-bold">Our mission:</span>
                            Innovate, promote, and deliver the future of the
                            digital employee experience.
                        </li>
                        <li>
                            <span class="font-bold">Our Vision:</span>
                            To empower businesses and create a global impact
                            through cutting-edge AI technology.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';
</script>
