<script setup>
import { defineProps } from 'vue';

defineProps({
    card: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div
        class="flex h-full w-full flex-col justify-center rounded-md bg-white p-8 shadow-md"
    >
        <p class="">"{{ card.feedback }}"</p>
        <p class="">- {{ card.name }}</p>
    </div>
</template>

<style scoped></style>
