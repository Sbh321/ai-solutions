<template>
    <Head title="Create Event" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Create Event
            </h2>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="submitForm">
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <div
                                        class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                                    >
                                        <div class="col-span-full">
                                            <label
                                                for="title"
                                                class="block text-sm/6 font-medium text-gray-900"
                                                >Title</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    type="text"
                                                    v-model="form.title"
                                                    id="title"
                                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                                    required
                                                />
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label
                                                for="location"
                                                class="block text-sm/6 font-medium text-gray-900"
                                                >Location</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    type="text"
                                                    v-model="form.location"
                                                    id="location"
                                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                                    required
                                                />
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label
                                                for="start_dateTime"
                                                class="block text-sm/6 font-medium text-gray-900"
                                                >Start Date & Time</label
                                            >
                                            <div class="mt-2">
                                                <input
                                                    type="datetime-local"
                                                    v-model="
                                                        form.start_dateTime
                                                    "
                                                    id="start_dateTime"
                                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                                    required
                                                />
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label
                                                for="image"
                                                class="block text-sm/6 font-medium text-gray-900"
                                                >Photo</label
                                            >
                                            <div
                                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                                            >
                                                <div class="text-center">
                                                    <PhotoIcon
                                                        class="mx-auto size-12 text-gray-300"
                                                        aria-hidden="true"
                                                    />
                                                    <div
                                                        class="mt-4 flex text-sm/6 text-gray-600"
                                                    >
                                                        <label
                                                            for="image"
                                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
                                                        >
                                                            <span
                                                                >Upload a
                                                                file</span
                                                            >
                                                            <input
                                                                id="image"
                                                                name="image"
                                                                type="file"
                                                                class="sr-only"
                                                                @change="
                                                                    handleFileUpload
                                                                "
                                                            />
                                                        </label>
                                                        <p class="pl-1">
                                                            or drag and drop
                                                        </p>
                                                    </div>
                                                    <p
                                                        class="text-xs/5 text-gray-600"
                                                    >
                                                        PNG, JPG, GIF up to 10MB
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Preview Section -->
                                            <div
                                                v-if="imagePreview"
                                                class="mt-4"
                                            >
                                                <p
                                                    class="text-sm text-gray-600"
                                                >
                                                    Image Preview:
                                                </p>
                                                <img
                                                    :src="imagePreview"
                                                    alt="Uploaded Image Preview"
                                                    class="mt-2 h-32 w-32 rounded object-cover"
                                                />
                                            </div>
                                        </div>
                                        <p
                                            v-if="errorMessage"
                                            class="text-sm text-red-600"
                                        >
                                            {{ errorMessage }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mt-6 flex items-center justify-end gap-x-6"
                            >
                                <button
                                    type="button"
                                    class="text-sm/6 font-semibold text-gray-900"
                                    @click="cancel"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { PhotoIcon } from '@heroicons/vue/24/solid';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';

interface EventForm {
    title: string;
    location: string;
    start_dateTime: string;
    image: File | null;
}

const form = ref<EventForm>({
    title: '',
    location: '',
    start_dateTime: '',
    image: null,
});

const imagePreview = ref<string | null>(null);
const errorMessage = ref<string | null>(null);

function handleFileUpload(event: Event) {
    const file = (event.target as HTMLInputElement)?.files?.[0];
    if (!file) return;

    // Allowed file extensions
    const allowedExtensions = [
        'image/png',
        'image/jpeg',
        'image/jpg',
        'image/gif',
    ];
    const maxSize = 2 * 1024 * 1024; // 2 MB in bytes

    // Validate file extension
    if (!allowedExtensions.includes(file.type)) {
        errorMessage.value =
            'Invalid file type. Only PNG, JPG, JPEG, and GIF are allowed.';
        form.value.image = null;
        imagePreview.value = null;
        return;
    }

    // Validate file size
    if (file.size > maxSize) {
        errorMessage.value = 'File size exceeds 2 MB limit.';
        form.value.image = null;
        imagePreview.value = null;
        return;
    }

    // If validation passes
    errorMessage.value = null;
    form.value.image = file;
    imagePreview.value = URL.createObjectURL(file);
}

function submitForm() {
    const formData = new FormData();
    formData.append('title', form.value.title);
    formData.append('location', form.value.location);

    const [start_date, start_time] = form.value.start_dateTime.split('T');
    formData.append('start_date', start_date);
    formData.append('start_time', start_time);

    if (form.value.image) {
        formData.append('image', form.value.image);
    }

    axios
        .post('/admin/events', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then((response) => {
            router.visit('/admin/events');
        })
        .catch((error) => {
            console.error('Error creating event:', error);
        });
}

function cancel() {
    router.visit('/admin/events');
}
</script>
