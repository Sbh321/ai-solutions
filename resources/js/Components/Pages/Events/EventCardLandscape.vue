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
    <div class="flex items-center gap-8">
        <div>
            <p>{{ card.smallDate }}</p>
        </div>
        <div
            class="flex flex-grow items-center gap-4 rounded-lg bg-[#F4F7FF] p-4 shadow-md"
        >
            <img
                :src="card.image"
                alt="Card image"
                class="h-[290px] rounded-lg object-cover"
                style="width: 290px"
            />
            <div class="flex-grow">
                <p class="mt-8 text-lg font-semibold">
                    {{ card.title }}
                </p>

                <p class="mt-3 text-sm text-[#626262]">
                    {{ card.location }}
                </p>

                <p class="mt-3 text-sm text-[#626262]">
                    {{ card.date }}
                </p>

                <p class="mt-3 text-sm text-[#626262]">
                    {{ card.time }}
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
