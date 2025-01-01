<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref } from 'vue';

const websiteLogo = ref<File | null>(null);
const location = ref('');
const phoneNumber = ref('');
const email = ref('');

const saveSettings = () => {
    const formData = new FormData();
    if (websiteLogo.value) {
        formData.append('website_logo', websiteLogo.value as File);
    }
    formData.append('location', location.value);
    formData.append('phone_number', phoneNumber.value);
    formData.append('email', email.value);

    axios
        .post('/admin/settings', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(() => {
            console.log('Settings saved successfully.');
            router.visit('/dashboard');
            alert('Settings saved successfully.');
        })
        .catch((error: any) => {
            console.log('Failed to save settings.', error);
        });
};

const imagePreview = ref<string | null>(
    websiteLogo.value
        ? `${import.meta.env.VITE_APP_URL}/storage/${websiteLogo.value}`
        : null,
);
const errorMessage = ref<string | null>(null);

function handleFileUpload(event: Event) {
    const file = (event.target as HTMLInputElement)?.files?.[0];
    if (!file) return;

    const allowedExtensions = [
        'image/png',
        'image/jpeg',
        'image/jpg',
        'image/gif',
    ];
    const maxSize = 2 * 1024 * 1024;

    if (!allowedExtensions.includes(file.type)) {
        errorMessage.value =
            'Invalid file type. Only PNG, JPG, JPEG, and GIF are allowed.';
        websiteLogo.value = null;
        imagePreview.value = null;
        return;
    }

    if (file.size > maxSize) {
        errorMessage.value = 'File size exceeds 2 MB limit.';
        websiteLogo.value = null;
        imagePreview.value = null;
        return;
    }

    errorMessage.value = null;
    websiteLogo.value = file;
    imagePreview.value = URL.createObjectURL(file);
}

onMounted(() => {
    axios
        .get('/settings')
        .then((response) => {
            const { setting } = response.data;
            location.value = setting.location;
            phoneNumber.value = setting.phone_number;
            email.value = setting.email;
            websiteLogo.value = setting.website_logo;
        })
        .then(() => {
            imagePreview.value = `${import.meta.env.VITE_APP_URL}/storage/${websiteLogo.value}`;
            websiteLogo.value = null;
        });
});
</script>

<template>
    <Head title="Settings" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Settings
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Settings Form -->
                        <form @submit.prevent="saveSettings">
                            <div class="space-y-6">
                                <!-- Website Logo -->
                                <div>
                                    <label
                                        for="website-logo"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >
                                        Website Logo
                                    </label>
                                    <input
                                        type="file"
                                        id="website-logo"
                                        name="website-logo"
                                        accept="image/*"
                                        class="mt-1 block w-full text-sm text-gray-900 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-blue-700 hover:file:bg-blue-100 dark:text-gray-100"
                                        @change="handleFileUpload"
                                    />
                                    <img
                                        v-if="imagePreview"
                                        :src="imagePreview"
                                        alt="Website Logo"
                                        class="mt-4 max-w-xs"
                                    />
                                    <p
                                        v-if="errorMessage"
                                        class="text-sm text-red-600"
                                    >
                                        {{ errorMessage }}
                                    </p>
                                </div>

                                <!-- Location -->
                                <div>
                                    <label
                                        for="location"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >
                                        Location
                                    </label>
                                    <input
                                        type="text"
                                        id="location"
                                        name="location"
                                        v-model="location"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-gray-100"
                                    />
                                </div>

                                <!-- Phone Number -->
                                <div>
                                    <label
                                        for="phone-number"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >
                                        Phone Number
                                    </label>
                                    <input
                                        type="text"
                                        id="phone-number"
                                        name="phone-number"
                                        v-model="phoneNumber"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-gray-100"
                                    />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label
                                        for="email"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        v-model="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-gray-100"
                                    />
                                </div>

                                <!-- Save Button -->
                                <div>
                                    <button
                                        type="submit"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    >
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
