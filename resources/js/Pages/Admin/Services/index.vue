<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

interface Service {
    id: number;
    title: string;
    description: string;
    image: string;
    created_at: string;
    updated_at: string;
}

defineProps({
    services: {
        type: Array as () => Service[],
        required: true,
    },
});

function getImageUrl(imagePath: string): string {
    if (!imagePath) return '';
    return `/storage/${imagePath}`;
}

const deleteService = (id: number) => {
    if (confirm('Are you sure you want to delete this service?')) {
        router.delete(route('admin.services.destroy', id));
    }
};
</script>

<template>
    <Head title="Services" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Services
            </h2>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4 flex justify-end">
                            <Link
                                href="/admin/services/create"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500"
                            >
                                Add New Service
                            </Link>
                        </div>
                        <div
                            v-if="services.length === 0"
                            class="py-4 text-center text-gray-500"
                        >
                            No services found.
                        </div>
                        <table
                            v-else
                            class="min-w-full divide-y divide-gray-300"
                        >
                            <thead>
                                <tr>
                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                    >
                                        Title
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Description
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Image
                                    </th>

                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 text-right text-sm font-semibold text-gray-900"
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr
                                    v-for="service in services"
                                    :key="service.id"
                                >
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                    >
                                        {{ service.title }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <div v-html="service.description"></div>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <img
                                            :src="getImageUrl(service.image)"
                                            alt="Service Image"
                                            class="h-10 w-10 rounded-full object-cover"
                                        />
                                    </td>
                                    <td
                                        class="flex justify-end gap-3 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'admin.services.edit',
                                                    service.id,
                                                )
                                            "
                                            class="text-indigo-600 hover:text-indigo-900"
                                        >
                                            Edit
                                        </Link>

                                        <button
                                            type="button"
                                            class="text-red-600 hover:text-red-900"
                                            @click="deleteService(service.id)"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
