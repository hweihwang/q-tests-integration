<template>
    <App :currentUser="currentUser">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Authors</h1>
                <div>
                    <Link href="/authors/create"
                          as="button"
                          class="px-4 py-2 rounded-lg bg-cyan-500 text-white hover:bg-cyan-600">
                        Create Author
                    </Link>
                    <Link href="/books/create"
                          as="button"
                          class="px-4 py-2 rounded-lg bg-cyan-500 text-white hover:bg-cyan-600 ml-10">
                        Create Book
                    </Link>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Birthday
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Gender
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place
                            of
                            Birth
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="author in authors" :key="author.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ author.id }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <Link :href="`/authors/${author.id}`" as="button" method="get"
                                  class="text-sm font-medium text-cyan-500 text-center">{{ author.firstName }} {{
                                author.lastName
                                }}
                            </Link>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ author.birthday }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ author.gender }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ author.placeOfBirth }}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                <p class="text-gray-500">Page {{ paging.currentPage }} of {{ paging.lastPage }}</p>
            </div>
        </div>
    </App>
</template>

<script setup>
import App from "@/Layouts/App.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    'authors': Array,
    'paging': Object,
    'currentUser': Object,
})
</script>