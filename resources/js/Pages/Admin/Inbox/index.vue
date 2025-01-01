<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { NTabPane, NTabs } from 'naive-ui';
import { ref } from 'vue';

const tabValue = ref('contacts');

interface Contacts {
    id: number;
    name: string;
    phone: string;
    email: string;
    company: string;
    country: string;
    subject: string;
    description: string;
}

interface Feedbacks {
    id: number;
    name: string;
    feedback: string;
    rating: number;
}

defineProps({
    contacts: {
        type: Array as () => Contacts[],
        required: true,
    },
    feedbacks: {
        type: Array as () => Feedbacks[],
        required: true,
    },
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Inbox
            </h2>
            <n-tabs
                type="segment"
                animated
                class="rounded-lg"
                v-model:value="tabValue"
            >
                <n-tab-pane name="contacts" tab="Contacts"> </n-tab-pane>
                <n-tab-pane name="feedbacks" tab="Feedbacks"></n-tab-pane>
            </n-tabs>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div v-if="tabValue === 'contacts'">
                            <div
                                v-if="contacts.length === 0"
                                class="py-4 text-center text-gray-500"
                            >
                                No contacts found.
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
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                        >
                                            Phone
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                        >
                                            Email
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                        >
                                            Company
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                        >
                                            Country
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                        >
                                            Subject
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 text-right text-sm font-semibold text-gray-900"
                                        >
                                            Description
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr
                                        v-for="contact in contacts"
                                        :key="contact.id"
                                    >
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                        >
                                            {{ contact.name }}
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500"
                                        >
                                            {{ contact.phone }}
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500"
                                        >
                                            {{ contact.email }}
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500"
                                        >
                                            {{ contact.company }}
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500"
                                        >
                                            {{ contact.country }}
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500"
                                        >
                                            {{ contact.subject }}
                                        </td>

                                        <td
                                            class="flex justify-end gap-3 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                        >
                                            {{ contact.description }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="tabValue === 'feedbacks'">
                            <div
                                v-if="feedbacks.length === 0"
                                class="py-4 text-center text-gray-500"
                            >
                                No feedbacks found.
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
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                        >
                                            Feedback
                                        </th>
                                        <th
                                            scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                        >
                                            Rating
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr
                                        v-for="feedback in feedbacks"
                                        :key="feedback.id"
                                    >
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                        >
                                            {{ feedback.name }}
                                        </td>

                                        <td
                                            class="py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-0"
                                        >
                                            {{ feedback.feedback }}
                                        </td>
                                        <td
                                            class="px-3 py-4 text-sm text-gray-500"
                                        >
                                            {{ feedback.rating }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
