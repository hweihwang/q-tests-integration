<template>
    <div class="bg-gray-100 h-screen">
        <nav class="bg-white shadow h-12">
            <div class="mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-4">
                        <Link href="/authors"
                              as="button"
                              class="font-semibold text-cyan-600 hover:text-cyan-800 px-3 py-2 rounded-md">Home
                        </Link>
                    </div>
                    <div class="flex space-x-4">
                        <Link href="/me"
                              as="button"
                              class="font-semibold text-cyan-500 hover:text-cyan-600 px-3 py-2 rounded-md">
                            {{ currentUser.firstName }} {{ currentUser.lastName }}
                        </Link>
                        <Link href="/logout"
                              as="button"
                              method="post"
                              class="font-semibold text-red-400 hover:text-red-500 px-3 py-2 rounded-md">
                            Log Out
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <div class="mx-auto mt-6 max-w-7xl">
            <slot/>
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    currentUser: Object,
});
</script>