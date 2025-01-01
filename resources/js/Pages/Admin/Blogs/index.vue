<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

interface Blog {
    id: number;
    title: string;
    description: string;
    image: string;
    created_at: string;
    updated_at: string;
}

defineProps({
    blogs: {
        type: Array as () => Blog[],
        required: true,
    },
});

function getImageUrl(imagePath: string): string {
    if (!imagePath) return '';
    return `/storage/${imagePath}`;
}

const deleteBlog = (id: number) => {
    if (confirm('Are you sure you want to delete this blog?')) {
        router.delete(route('admin.blogs.destroy', id));
    }
};
</script>

<template>
    <Head title="Blogs" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Blogs
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
                                href="/admin/blogs/create"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500"
                            >
                                Add New Blog
                            </Link>
                        </div>
                        <div
                            v-if="blogs.length === 0"
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
                                <tr v-for="blog in blogs" :key="blog.id">
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
                                    >
                                        {{ blog.title }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <div v-html="blog.description"></div>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        <img
                                            :src="getImageUrl(blog.image)"
                                            alt="Blog Image"
                                            class="h-10 w-10 rounded-full object-cover"
                                        />
                                    </td>
                                    <td
                                        class="flex justify-end gap-3 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'admin.blogs.edit',
                                                    blog.id,
                                                )
                                            "
                                            class="text-indigo-600 hover:text-indigo-900"
                                        >
                                            Edit
                                        </Link>

                                        <button
                                            type="button"
                                            class="text-red-600 hover:text-red-900"
                                            @click="deleteBlog(blog.id)"
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
