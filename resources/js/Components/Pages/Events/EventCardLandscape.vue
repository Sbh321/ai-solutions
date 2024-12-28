<script setup lang="ts">
import { defineProps } from 'vue';

// Define the type for the `card` prop
interface Card {
    image: string;
    title: string;
    location: string;
    date: string;
    smallDate: string;
    time: string;
}

// Define props with the appropriate types
defineProps<{
    card: Card;
}>();
</script>

<template>
    <div class="flex items-center gap-2 md:gap-8">
        <div>
            <p>{{ card.smallDate }}</p>
        </div>
        <div
            class="flex flex-grow items-center gap-4 rounded-lg bg-[#F4F7FF] p-3 shadow-md md:gap-8 md:p-4"
        >
            <img
                :src="card.image"
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
                    {{ card.date }}
                </p>

                <p class="mt-2 text-sm text-[#626262] md:mt-3">
                    {{ card.time }}
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
