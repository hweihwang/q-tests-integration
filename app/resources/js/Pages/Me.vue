<template>
    <App :currentUser="user">
        <div class="flex flex-col h-screen bg-gray-100">
            <div class="bg-white shadow-md py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-gray-800">User Info</h1>
            </div>
            <div class="py-6 px-4 sm:px-6 lg:px-8 flex-grow">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="mb-4">
                            <label for="firstName" class="block text-sm font-medium text-gray-700">
                                First Name
                            </label>
                            <div class="mt-1">
                                <input
                                        type="text"
                                        id="firstName"
                                        name="firstName"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        :value="user.firstName"
                                        readonly
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="lastName" class="block text-sm font-medium text-gray-700">
                                Last Name
                            </label>
                            <div class="mt-1">
                                <input
                                        type="text"
                                        id="lastName"
                                        name="lastName"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        :value="user.lastName"
                                        readonly
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email
                            </label>
                            <div class="mt-1">
                                <input
                                        type="text"
                                        id="email"
                                        name="email"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        :value="user.email"
                                        readonly
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">
                                Gender
                            </label>
                            <div class="mt-1">
                                <input
                                        type="text"
                                        id="gender"
                                        name="gender"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        :value="user.gender"
                                        readonly
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="active" class="block text-sm font-medium text-gray-700">
                                Active
                            </label>
                            <div class="mt-1">
                                <input
                                        type="text"
                                        id="active"
                                        name="active"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        :value="user.active ? 'Yes' : 'No'"
                                        readonly
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="emailVerified" class="block text-sm font-medium text-gray-700">
                                Email Verified
                            </label>
                            <div class="mt-1">
                                <input
                                        type="text"
                                        id="emailVerified"
                                        name="emailVerified"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                        :value="user.emailVerified ? 'Yes' : 'No'"
                                        readonly
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>


<script setup>
import App from "@/Layouts/App.vue";

defineProps({
    user: Object,
})
</script>