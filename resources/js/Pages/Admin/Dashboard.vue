<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Charts from './Charts.vue';

const userStats = {
    totalUsers: 25,
    activeUsers: 5,
    newUsers: 10,
};

const blogStats = {
    totalBlogs: 6,
    publishedBlogs: 10,
    drafts: 15,
};

const visitStats = {
    totalVisits: 150,
    uniqueVisits: 53,
    bounceRate: 35,
};

const feedbackStats = {
    totalFeedbacks: 6,
    positiveFeedback: 6,
    negativeFeedback: 0,
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4"
                >
                    <!-- User Stats Card -->
                    <div
                        class="overflow-hidden bg-white p-6 shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-gray-100"
                        >
                            User Stats
                        </h3>
                        <ul
                            class="mt-4 space-y-2 text-gray-600 dark:text-gray-400"
                        >
                            <li>Total Users: {{ userStats.totalUsers }}</li>
                            <li>Active Users: {{ userStats.activeUsers }}</li>
                            <li>New Users Today: {{ userStats.newUsers }}</li>
                        </ul>
                    </div>

                    <!-- Blog Stats Card -->
                    <div
                        class="overflow-hidden bg-white p-6 shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-gray-100"
                        >
                            Blog Stats
                        </h3>
                        <ul
                            class="mt-4 space-y-2 text-gray-600 dark:text-gray-400"
                        >
                            <li>Total Blogs: {{ blogStats.totalBlogs }}</li>
                            <li>
                                Published Blogs: {{ blogStats.publishedBlogs }}
                            </li>
                            <li>Drafts: {{ blogStats.drafts }}</li>
                        </ul>
                    </div>

                    <!-- Website Visits Card -->
                    <div
                        class="overflow-hidden bg-white p-6 shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-gray-100"
                        >
                            Website Visits
                        </h3>
                        <ul
                            class="mt-4 space-y-2 text-gray-600 dark:text-gray-400"
                        >
                            <li>Total Visits: {{ visitStats.totalVisits }}</li>
                            <li>
                                Unique Visits: {{ visitStats.uniqueVisits }}
                            </li>
                            <li>Bounce Rate: {{ visitStats.bounceRate }}%</li>
                        </ul>
                    </div>

                    <!-- Feedback Stats Card -->
                    <div
                        class="overflow-hidden bg-white p-6 shadow-sm dark:bg-gray-800 sm:rounded-lg"
                    >
                        <h3
                            class="text-xl font-semibold text-gray-900 dark:text-gray-100"
                        >
                            Feedback Stats
                        </h3>
                        <ul
                            class="mt-4 space-y-2 text-gray-600 dark:text-gray-400"
                        >
                            <li>
                                Total Feedbacks:
                                {{ feedbackStats.totalFeedbacks }}
                            </li>
                            <li>
                                Positive Feedback:
                                {{ feedbackStats.positiveFeedback }}
                            </li>
                            <li>
                                Negative Feedback:
                                {{ feedbackStats.negativeFeedback }}
                            </li>
                        </ul>
                    </div>
                </div>
                <Charts class="pt-8" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
