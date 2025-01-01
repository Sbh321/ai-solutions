<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    id: number;
    image: string;
    title: string;
    description: string;
}

function getImageUrl(imagePath: string): string {
    if (!imagePath) return '';
    return `/storage/${imagePath}`;
}

// Define props with the appropriate types
defineProps<{
    card: Card;
}>();
</script>

<template>
    <div class="rounded-lg bg-[#F4F7FF] p-4 shadow-md">
        <img
            :src="getImageUrl(card.image)"
            alt="Card image"
            class="h-[200px] w-full rounded-lg object-cover md:h-[290px]"
        />
        <p class="mt-4 text-lg font-semibold md:mt-8">
            <Link
                :href="`/blogs/${card.id}`"
                class="cursor-pointer hover:underline"
            >
                {{ card.title }}
            </Link>
        </p>

        <p class="mt-2 line-clamp-3 text-sm text-[#626262] md:mt-4">
            {{ card.description }}
        </p>
    </div>
</template>

<style scoped></style>
