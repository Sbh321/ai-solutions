<template>
    <DefaultLayoutVue>
        <Head title="Blog Details" />

        <div class="container py-20">
            <p class="mb-8 text-4xl font-bold">
                {{ blog.title }}
            </p>

            <p class="text-[#626262]">
                {{ blog.description }}
            </p>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';

interface Blog {
    id: number;
    image: string;
    title: string;
    description: string;
}

defineProps<{ blog: Blog }>();
</script>

<style></style>
