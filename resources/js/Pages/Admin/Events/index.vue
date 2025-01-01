<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

interface Event {
    id: number;
    title: string;
    location: string;
    start_date: string;
    start_time: string;
    image: string | null;
    created_at: string;
    updated_at: string;
}

defineProps({
    events: {
        type: Array as () => Event[],
        required: true,
    },
});

function getImageUrl(imagePath: string | null): string {
    if (!imagePath) return '';
    return `${import.meta.env.VITE_APP_URL}/storage/${imagePath}`;
}

const deleteEvent = (id: number) => {
    if (confirm('Are you sure you want to delete this event?')) {
        router.delete(route('admin.events.destroy', id));
    }
};
</script>

<template>
    <Head title="Events" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Events
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
                                href="/admin/events/create"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500"
                            >
                                Add New Event
                            </Link>
                        </div>
                        <div
                            v-if="events.length === 0"
                            class="py-4 text-center text-gray-500"
                        >
                            No events found.
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
                                        Location
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                    >
                                        Start Date & Time
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
                                <tr v-for="event in events" :key="event.id">
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                    >
                                        {{ event.title }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        {{ event.location }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        {{ event.start_date }} at
                                        {{ event.start_time }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <img
                                            :src="getImageUrl(event.image)"
                                            alt="Event Image"
                                            class="h-10 w-10 rounded-full object-cover"
                                        />
                                    </td>
                                    <td
                                        class="flex justify-end gap-3 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'admin.events.edit',
                                                    event.id,
                                                )
                                            "
                                            class="text-indigo-600 hover:text-indigo-900"
                                        >
                                            Edit
                                        </Link>

                                        <button
                                            type="button"
                                            class="text-red-600 hover:text-red-900"
                                            @click="deleteEvent(event.id)"
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
