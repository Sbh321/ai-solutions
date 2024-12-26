<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Use the `ref` to create a reactive state for `isOpen` with a boolean type
const route: string = window.location.pathname; // Type `route` as a string
const isOpen = ref<boolean>(false); // Specify that `isOpen` is a boolean
</script>

<template>
    <!-- Navigation Menu -->
    <nav class="h-full bg-[#F4F7FF] shadow-md">
        <div
            class="container mx-auto flex h-full items-center justify-between px-4"
        >
            <!-- Logo -->
            <div class="flex flex-col items-center py-2">
                <Link href="/"
                    ><img
                        src="/images/NewLogo.jpg"
                        alt="AI Solutions Logo"
                        class="h-14 rounded-full"
                /></Link>
            </div>
            <!-- Links -->
            <div class="hidden h-16 items-center space-x-4 md:flex">
                <Link
                    href="/"
                    class="flex h-full items-center px-4 text-gray-700 hover:text-gray-900"
                    :class="{
                        'border-b-2 border-gray-900': route === '/',
                    }"
                >
                    Home
                </Link>
                <Link
                    href="/about"
                    class="flex h-full items-center px-4 text-gray-700 hover:text-gray-900"
                    :class="{
                        'border-b-2 border-gray-900': route === '/about',
                    }"
                >
                    About Us
                </Link>
                <Link
                    href="/services"
                    class="flex h-full items-center px-4 text-gray-700 hover:text-gray-900"
                    :class="{
                        'border-b-2 border-gray-900': route === '/services',
                    }"
                >
                    Services
                </Link>
                <Link
                    href="/events"
                    class="flex h-full items-center px-4 text-gray-700 hover:text-gray-900"
                    :class="{
                        'border-b-2 border-gray-900': route === '/events',
                    }"
                >
                    Events
                </Link>
                <Link
                    href="/blogs"
                    class="flex h-full items-center px-4 text-gray-700 hover:text-gray-900"
                    :class="{
                        'border-b-2 border-gray-900': route === '/blogs',
                    }"
                >
                    Blogs
                </Link>
            </div>
            <!-- Contact Button -->
            <div class="hidden py-2 md:block">
                <Link
                    href="/contact"
                    class="rounded-lg bg-gray-700 px-4 py-2 text-white hover:bg-gray-800"
                >
                    Contact Us
                </Link>
            </div>
            <!-- Mobile Menu -->
            <button
                class="py-2 text-gray-800 md:hidden"
                @click="isOpen = !isOpen"
                aria-label="Toggle Menu"
            >
                <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"
                    ></path>
                </svg>
            </button>
        </div>
        <!-- Mobile Dropdown -->
        <div v-if="isOpen" class="bg-blue-50 md:hidden">
            <Link
                href="/"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
            >
                Home
            </Link>
            <Link
                href="/about"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
            >
                About Us
            </Link>
            <Link
                href="/services"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
            >
                Services
            </Link>
            <Link
                href="/events"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
            >
                Events
            </Link>
            <Link
                href="/blogs"
                class="block px-4 py-2 text-gray-700 hover:bg-gray-200"
            >
                Blogs
            </Link>
            <Link
                href="/contact"
                class="mt-2 w-full rounded bg-gray-700 px-4 py-2 text-white hover:bg-gray-800"
            >
                Contact Us
            </Link>
        </div>
    </nav>
</template>
