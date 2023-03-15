<template>
    <App :currentUser="currentUser">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-medium">{{ author.firstName }} {{ author.lastName }}</h2>
                <Link
                        v-if="canBeDeleted"
                        :href="`/authors/${author.id}`"
                        as="button"
                        method="delete"
                        class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600"
                >
                    Delete Author
                </Link>
            </div>
            <div class="flex flex-wrap mb-8 flex-col">
                <div class="mb-5">
                    <span class="text-md font-medium mb-2">Birthday: </span>
                    <span>{{ author.birthday }}</span>
                </div>
                <div class="mb-5">
                    <span class="text-md font-medium mb-2">Gender: </span>
                    <span>{{ author.gender }}</span>
                </div>
                <div>
                    <span class="text-md font-medium mb-2">Place of birth: </span>
                    <span>{{ author.placeOfBirth }}</span>
                </div>
            </div>
            <h3 v-if="books.length"
                class="text-2xl font-medium mb-5">
                Books
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div v-for="book in books" :key="book.id" class="bg-gray-200 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-medium">{{ book.title }}</h4>
                        <Link
                                :href="`/books/${book.id}`"
                                as="button"
                                method="delete"
                                class="text-red-600 hover:text-red-800"
                        >
                            Delete
                        </Link>
                    </div>
                    <p class="text-gray-600 text-sm mb-2">Released on {{ book.releaseDate }}</p>
                    <p class="text-gray-600 text-sm">{{ book.description }}</p>
                    <div class="mt-2">
                        <p class="text-gray-600 text-sm"><span class="font-medium">ISBN:</span> {{ book.isbn }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-medium">Format:</span> {{ book.format }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-medium">Pages:</span> {{ book.pages }}</p>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import App from "@/Layouts/App.vue";

defineProps({
    'author': Object,
    'books': Array,
    'canBeDeleted': Boolean,
    'currentUser': Object,
})
</script>