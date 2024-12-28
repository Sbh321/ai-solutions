<template>
    <DefaultLayoutVue>
        <Head title="Contact" />

        <div class="container py-10">
            <div class="md:flex">
                <div class="flex w-1/2">
                    <img
                        src="/images/contact.png"
                        alt=""
                        class="max-w-[500px] object-cover"
                    />
                </div>
                <div class="flex w-1/2">
                    <div class="flex w-full justify-center">
                        <div class="w-full rounded-lg bg-white p-8 shadow-lg">
                            <h2 class="mb-4 text-2xl font-semibold">
                                How can we assist?
                            </h2>
                            <p class="mb-6 text-sm text-gray-600">
                                Reach Out To The World's Most Reliable IT
                                Services.
                            </p>
                            <form @submit.prevent="handleSubmit">
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Name -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-[#626262]"
                                            for="name"
                                        >
                                            Name
                                        </label>
                                        <input
                                            id="name"
                                            v-model="form.name"
                                            type="text"
                                            placeholder="Enter Your Name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                    <!-- Phone Number -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-[#626262]"
                                            for="phone"
                                        >
                                            Phone Number
                                        </label>
                                        <input
                                            id="phone"
                                            v-model="form.phone"
                                            type="text"
                                            placeholder="Phone No.."
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                    <!-- Email Address -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-[#626262]"
                                            for="email"
                                        >
                                            Email Address
                                        </label>
                                        <input
                                            id="email"
                                            v-model="form.email"
                                            type="email"
                                            placeholder="Enter Email Address"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                    <!-- Subject -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-[#626262]"
                                            for="subject"
                                        >
                                            Subject
                                        </label>
                                        <input
                                            id="subject"
                                            v-model="form.subject"
                                            type="text"
                                            placeholder="Enter Subject"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                </div>
                                <!-- Description -->
                                <div class="mt-4">
                                    <label
                                        class="block text-sm font-medium text-[#626262]"
                                        for="description"
                                    >
                                        Description
                                    </label>
                                    <textarea
                                        id="description"
                                        v-model="form.description"
                                        placeholder="Enter Description"
                                        rows="4"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    ></textarea>
                                </div>
                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button
                                        type="submit"
                                        class="w-full rounded-md bg-blue-500 px-4 py-2 font-medium text-white hover:bg-blue-600"
                                    >
                                        SUBMIT
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-10">
            <div class="md:flex">
                <div class="flex h-[450px] w-1/2">
                    <img
                        src="/images/contact-2.png"
                        alt=""
                        class="max-w-[500px] rounded-md object-cover"
                    />
                </div>
                <div class="flex w-1/2 flex-col justify-center gap-12">
                    <div class="flex items-center gap-4">
                        <img src="/icons/phone.svg" alt="" class="h-12 w-12" />
                        <div>
                            <p class="text-xl">+44 161 123 4567</p>
                            <p class="text-[#626262]">
                                Reach out to us at the numbers provided above.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <img
                            src="/icons/location.svg"
                            alt=""
                            class="h-12 w-12"
                        />
                        <div>
                            <p class="text-xl">Uk:</p>
                            <p class="text-[#626262]">
                                Manchester, United Kingdom
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayoutVue>
</template>

<script setup lang="ts">
import DefaultLayoutVue from '@/Layouts/DefaultLayout.vue.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';

const form = reactive({
    name: '',
    phone: '',
    email: '',
    subject: '',
    description: '',
});

const handleSubmit = () => {
    console.log(form);
};
</script>
