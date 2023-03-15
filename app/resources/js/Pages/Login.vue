<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-200">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-xl font-bold mb-6">Login</h1>

            <form class="space-y-4">
                <div class="flex flex-col">
                    <label class="font-semibold">Email:</label>
                    <input type="email" v-model="form.email" class="border rounded-lg px-3 py-2 mt-1 w-full">
                </div>

                <div class="flex flex-col">
                    <label class="font-semibold">Password:</label>
                    <input type="password" v-model="form.password" class="border rounded-lg px-3 py-2 mt-1 w-full">
                </div>

                <Link href="/login"
                      as="button"
                      method="post"
                      :data="form"
                      class="bg-blue-500 text-white rounded-lg px-4 py-2 mt-4 hover:bg-blue-600">Login
                </Link>
            </form>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {Link} from "@inertiajs/vue3";

const form = ref({
    email: '',
    password: '',
});
</script>