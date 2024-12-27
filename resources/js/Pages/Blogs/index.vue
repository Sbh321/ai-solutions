<template>
    <DefaultLayoutVue>
        <Head title="Blogs" />

        <!-- Intro Section -->
        <div class="flex h-screen flex-col">
            <!-- Hero Section -->
            <div
                class="relative flex-grow bg-center"
                style="background-image: url('/images/background/blogs.png')"
            >
                <!-- White opaque veil -->
                <div class="absolute inset-0 bg-white bg-opacity-60"></div>

                <!-- Centered content -->
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center gap-14"
                >
                    <p
                        class="max-w-[800px] text-center text-6xl font-bold text-[#00133D]"
                    >
                        Blogs and Photo Gallery
                    </p>
                </div>
            </div>
        </div>

        <div class="container py-20">
            <p class="mb-8 text-4xl font-bold">Insights and Updates</p>

            <div
                class="grid grid-cols-1 gap-4 px-4 md:grid-cols-2 lg:grid-cols-3"
            >
                <BlogCard
                    v-for="card in blogCards"
                    :card="card"
                    :key="card.title"
                />
            </div>
        </div>

        <div class="container mx-auto py-20">
            <p class="mb-8 text-4xl font-bold">Our gallery</p>

            <div
                class="grid gap-4"
                style="
                    display: grid;
                    grid-template-columns: repeat(6, 1fr);
                    grid-template-rows: repeat(4, 200px);
                    grid-gap: 16px;
                "
            >
                <!-- Image 1 -->
                <div
                    class="col-span-4 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[0].src"
                        :alt="images[0].alt"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Image 2 -->
                <div
                    class="col-span-2 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[1].src"
                        :alt="images[1].alt"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Image 3 -->
                <div
                    class="col-span-2 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[2].src"
                        :alt="images[2].alt"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Image 4 -->
                <div
                    class="col-span-4 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[3].src"
                        :alt="images[3].alt"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Image 5 -->
                <div
                    class="col-span-3 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[4].src"
                        :alt="images[4].alt"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Image 6 -->
                <div
                    class="col-span-3 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[5].src"
                        :alt="images[5].alt"
                        class="h-full w-full object-cover"
                    />
                </div>

                <!-- Image 7 -->
                <div
                    class="col-span-6 row-span-2 overflow-hidden rounded shadow-lg"
                >
                    <img
                        :src="images[6].src"
                        :alt="images[6].alt"
                        class="h-full w-full object-cover"
                    />
                </div>
            </div>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import BlogCard from '@/Components/Pages/Blogs/BlogCard.vue';
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';

const blogCards = [
    {
        image: '/images/temp/event_1.png',
        title: 'AI at Workplace',
        subTitle: 'How AI is transforming employee experiences?',
        description:
            'Artificial Intelligence (AI) is fundamentally changing how employees interact with their workplaces, creating environments that are smarter, more adaptive, and highly efficient. AI-driven tools now play a pivotal role in automating routine tasks, freeing employees to focus on strategic and creative aspects of their jobs. Intelligent virtual assistants provide personalized support, helping with scheduling, task prioritization, and knowledge retrieval, thereby reducing cognitive load and improving overall productivity. Furthermore, AI-powered analytics uncover insights into employee behavior, enabling leaders to create tailored wellness programs, optimize workflows, and improve engagement. As organizations continue to embrace AI, the traditional office is evolving into a space that prioritizes innovation, satisfaction, and growth.',
    },
    {
        image: '/images/temp/event_2.png',
        title: 'Prototyping with AI',
        subTitle: 'How AI is transforming employee experiences?',
        description:
            'The integration of Artificial Intelligence in prototyping is revolutionizing the way ideas are developed and tested. AI algorithms accelerate the prototyping phase by analyzing requirements, generating design variations, and simulating real-world applications. This ensures that teams can test feasibility and refine concepts rapidly, reducing time-to-market and costs. Moreover, AI tools can predict user interactions, allowing for the creation of prototypes that are more intuitive and aligned with user expectations. By using machine learning to identify potential flaws early, businesses can make informed adjustments, enhancing the quality and success rate of their projects. AI not only speeds up the prototyping process but also fosters innovation, paving the way for groundbreaking solutions.',
    },
    {
        image: '/images/temp/event_3.png',
        title: 'AI Trends and Innovations',
        subTitle: 'How AI is transforming employee experiences?',
        description:
            'The rapid advancements in Artificial Intelligence have given rise to groundbreaking trends and innovations that are reshaping industries and redefining possibilities. From generative AI models like GPT and DALL-E to breakthroughs in neural networks, AI is expanding its influence across domains such as healthcare, education, and workplace management. Companies are leveraging AI to analyze massive datasets, identify patterns, and make predictions that were previously unimaginable. Innovations such as AI-driven chatbots, automated decision-making systems, and intelligent robots are becoming integral to modern business strategies. These trends not only improve efficiency but also open doors to creative problem-solving and entirely new industries. Staying updated on these developments is crucial for organizations aiming to remain competitive in a rapidly evolving digital landscape.',
    },
];

const images = [
    { src: '/images/gallery/one.png', alt: 'Image 1' },
    { src: '/images/gallery/two.png', alt: 'Image 2' },
    { src: '/images/gallery/three.png', alt: 'Image 3' },
    { src: '/images/gallery/four.png', alt: 'Image 4' },
    { src: '/images/gallery/five.png', alt: 'Image 5' },
    { src: '/images/gallery/six.png', alt: 'Image 6' },
    { src: '/images/gallery/seven.png', alt: 'Image 7' },
];
</script>

<style>
/* Custom responsive behavior for smaller screens */
@media (max-width: 768px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: auto;
    }
}
</style>
