<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-6 align-middle sm:px-6 lg:px-8"
                >
                    <table class="min-w-full divide-y divide-gray-300">
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
                                    Title
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
                        <tbody class="divide-y divide-gray-200">
                            <tr v-for="user in users" :key="user.id">
                                <td
                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                >
                                    {{ user.name }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500">
                                    {{ user.title }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500">
                                    {{ user.email }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500">
                                    {{ user.role }}
                                </td>
                                <td
                                    class="flex justify-end gap-3 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                >
                                    <button
                                        type="button"
                                        class="text-indigo-600 hover:text-indigo-900"
                                        @click="editUser(user.id)"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        type="button"
                                        class="text-red-600 hover:text-red-900"
                                        @click="editUser(user.id)"
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
</template>

<script setup>
import { ref } from 'vue';

const users = ref([
    {
        id: 1,
        name: 'John Doe',
        title: 'Software Engineer',
        email: 'john.doe@example.com',
        role: 'Admin',
    },
    {
        id: 2,
        name: 'Jane Smith',
        title: 'Project Manager',
        email: 'jane.smith@example.com',
        role: 'User',
    },
]);

const editUser = (userId) => {
    console.log(`Edit user with ID: ${userId}`);
};
</script>

<style scoped></style>
