<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import axios from 'axios';

interface User {
    id: number;
    name: string;
    email: string;
    role: string;
}

defineProps<{ users: User[] }>();

const deleteAdmin = (id: number) => {
    if (confirm('Are you sure you want to delete this admin?')) {
        axios.delete(route('admin.user.delete', id)).then(() => {
            router.reload();
        });
    }
};
</script>

<template>
    <Head title="Admin List" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Admin List
            </h2>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="flow-root">
                                <div
                                    class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                                >
                                    <div
                                        class="inline-block min-w-full py-6 align-middle sm:px-6 lg:px-8"
                                    >
                                        <div
                                            v-if="users.length === 0"
                                            class="py-4 text-center text-gray-500"
                                        >
                                            No blogs found.
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
                                                        Email
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                    >
                                                        Role
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="py-3.5 pl-4 text-right text-sm font-semibold text-gray-900"
                                                    >
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="divide-y divide-gray-200"
                                            >
                                                <tr
                                                    v-for="user in users"
                                                    :key="user.id"
                                                >
                                                    <td
                                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                                    >
                                                        {{ user.name }}
                                                    </td>
                                                    <td
                                                        class="px-3 py-4 text-sm text-gray-500"
                                                    >
                                                        {{ user.email }}
                                                    </td>
                                                    <td
                                                        class="px-3 py-4 text-sm text-gray-500"
                                                    >
                                                        Admin
                                                    </td>
                                                    <td
                                                        class="flex justify-end gap-3 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                                    >
                                                        <button
                                                            type="button"
                                                            class="text-red-600 hover:text-red-900"
                                                            @click="
                                                                deleteAdmin(
                                                                    user.id,
                                                                )
                                                            "
                                                        >
                                                            Remove
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
