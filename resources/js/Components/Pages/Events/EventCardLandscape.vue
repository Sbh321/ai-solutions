<script setup lang="ts">
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    image: string;
    title: string;
    location: string;
    start_date: string;
    start_time: string;
}

// Define props with the appropriate types
defineProps<{
    card: Card;
}>();

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

const formatSmallDate = (date: string) => {
    const d = new Date(date);

    const month = d.toLocaleString('default', { month: 'short' });

    const day = d.getDate();

    return `${month}, ${day}`;
};
</script>

<template>
    <div class="flex items-center gap-2 md:gap-8">
        <div>
            <p>{{ formatSmallDate(card.start_date) }}</p>
        </div>
        <div
            class="flex flex-grow items-center gap-4 rounded-lg bg-[#F4F7FF] p-3 shadow-md md:gap-8 md:p-4"
        >
            <img
                :src="getImageUrl(card.image)"
                alt="Card image"
                class="h-[150px] w-[150px] rounded-lg object-cover md:h-[290px] md:w-[290px]"
            />
            <div class="flex-grow">
                <p class="text-md font-semibold md:text-lg">
                    {{ card.title }}
                </p>

                <p class="mt-2 text-sm text-[#626262] md:mt-3">
                    {{ card.location }}
                </p>

                <p class="mt-2 text-sm text-[#626262] md:mt-3">
                    {{ formatDate(card.start_date) }}
                </p>

                <p class="mt-2 text-sm text-[#626262] md:mt-3">
                    {{ formatTime(card.start_time) }}
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
