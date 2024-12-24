<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    image: string;
    title: string;
    subTitle: string;
    description: string;
}

// Define props with the appropriate types
defineProps<{
    card: Card;
}>();
</script>

<template>
    <div class="rounded-lg bg-[#F4F7FF] p-4 shadow-md">
        <img
            :src="card.image"
            alt="Card image"
            class="h-[290px] w-full rounded-lg object-cover"
        />
        <p class="mt-8 text-lg font-semibold">
            <Link href="/blogs/1" class="cursor-pointer hover:underline">
                {{ card.title }}
            </Link>
        </p>

        <p class="mt-4 text-sm text-[#626262]">
            {{ card.subTitle }}
        </p>

        <p class="mt-4 line-clamp-3 text-sm text-[#626262]">
            {{ card.description }}
        </p>
    </div>
</template>

<style scoped></style>
