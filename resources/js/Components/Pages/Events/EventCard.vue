<script setup lang="ts">
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    id: number;
    image: string;
    title: string;
    location: string;
    start_date: string;
    start_time: string;
}

function getImageUrl(imagePath: string): string {
    if (!imagePath) return '';
    return `${import.meta.env.VITE_APP_URL}/storage/${imagePath}`;
}

const formatDate = (date: string) => {
    const d = new Date(date);

    const day = d.getDate();
    const month = d.toLocaleString('default', { month: 'long' }); // "August"
    const year = d.getFullYear();

    const suffix =
        day === 1 || day === 21 || day === 31
            ? 'st'
            : day === 2 || day === 22
              ? 'nd'
              : day === 3 || day === 23
                ? 'rd'
                : 'th';

    return `${day}${suffix} ${month} ${year}`;
};

const formatTime = (time: string) => {
    const date = new Date(`1970-01-01T${time}:00Z`);

    return date.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit',
        hour12: true,
    });
};

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
            class="h-[290px] w-full rounded-lg object-cover"
        />
        <p class="mt-8 text-lg font-semibold">
            {{ card.title }}
        </p>

        <p class="mt-4 text-sm text-[#626262]">
            {{ card.location }}
        </p>

        <p class="mt-2 text-sm text-[#626262]">
            {{ formatDate(card.start_date) }}
        </p>

        <p class="mt-2 text-sm text-[#626262]">
            {{ formatTime(card.start_time) }}
        </p>
    </div>
</template>

<style scoped></style>
