<script setup lang="ts">
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    image: string;
    title: string;
    location: string;
    date: string;
    time: string;
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
            {{ card.title }}
        </p>

        <p class="mt-4 text-sm text-[#626262]">
            {{ card.location }}
        </p>

        <p class="mt-2 text-sm text-[#626262]">
            {{ card.date }}
        </p>

        <p class="mt-2 text-sm text-[#626262]">
            {{ card.time }}
        </p>
    </div>
</template>

<style scoped></style>
