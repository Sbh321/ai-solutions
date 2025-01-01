<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

interface Card {
    id: number;
    image: string;

    title: string;
}

defineProps<{
    card: Card;
}>();

function getImageUrl(imagePath: string): string {
    if (!imagePath) return '';
    return `/storage/${imagePath}`;
}
</script>

<template>
    <div>
        <img
            :src="getImageUrl(card.image)"
            alt=""
            class="h-[260px] w-full rounded-lg object-cover"
        />
        <p class="mt-8 text-center text-lg font-semibold">
            <Link
                :href="`/services/${card.id}`"
                class="cursor-pointer hover:underline"
            >
                {{ card.title }}
            </Link>
        </p>
    </div>
</template>

<style scoped></style>
