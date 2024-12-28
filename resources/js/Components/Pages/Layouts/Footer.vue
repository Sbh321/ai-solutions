<template>
    <footer class="bg-[#00133D] py-12 text-white">
        <div
            class="container mx-auto grid grid-cols-1 gap-8 px-4 md:grid-cols-4"
        >
            <!-- Logo Section -->
            <div class="flex items-center justify-center md:justify-start">
                <img
                    src="/images/Logo.png"
                    alt="AI Solutions Logo"
                    class="mb-4 h-auto w-40"
                />
            </div>

            <!-- Contacts Section -->
            <div class="text-center md:text-left">
                <h3 class="mb-2 text-lg font-semibold">Contacts</h3>
                <p class="mb-2 text-[#C9C9C9]">Manchester, United Kingdom</p>
                <p class="mb-2 text-[#C9C9C9]">+44 161 123 4567</p>
                <p class="mb-2 text-[#C9C9C9]">aisolutions123@gmail.com</p>
            </div>

            <!-- Menu Section -->
            <div class="text-center md:text-left">
                <h3 class="mb-2 text-lg font-semibold">Menu</h3>
                <ul class="space-y-1">
                    <li class="text-[#C9C9C9]">
                        <Link href="/" class="hover:text-gray-300">Home</Link>
                    </li>
                    <li class="text-[#C9C9C9]">
                        <Link href="/about" class="hover:text-gray-300">
                            About Us
                        </Link>
                    </li>
                    <li class="text-[#C9C9C9]">
                        <Link href="/services" class="hover:text-gray-300"
                            >Services
                        </Link>
                    </li>
                    <li class="text-[#C9C9C9]">
                        <Link href="/events" class="hover:text-gray-300">
                            Events
                        </Link>
                    </li>
                    <li class="text-[#C9C9C9]">
                        <Link href="/blogs" class="hover:text-gray-300">
                            Blogs
                        </Link>
                    </li>
                </ul>
            </div>

            <!-- Contact Us Section -->
            <div class="text-center md:text-left">
                <h3 class="mb-2 text-lg font-semibold">Contact Us</h3>
                <p class="mb-4 text-[#C9C9C9]">Reach Out Today</p>
                <Link
                    href="/contact"
                    class="rounded bg-gray-600 px-4 py-2 text-white hover:bg-gray-500"
                >
                    CONTACT US
                </Link>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-8 pt-4 text-center">
            <p class="text-sm">@{{ new Date().getFullYear() }} AI Solution</p>
        </div>
    </footer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>
