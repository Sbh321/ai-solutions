<script setup lang="ts">
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    image: string;
    title: string;
}

// Define props with the appropriate types
defineProps<{
    card: Card;
}>();
</script>

<template>
    <div>
        <img
            :src="card.image"
            alt=""
            class="h-[260px] w-full rounded-lg object-cover"
        />
        <p class="mt-8 text-center text-lg font-semibold">
            {{ card.title }}
        </p>
    </div>
</template>

<style scoped></style>
