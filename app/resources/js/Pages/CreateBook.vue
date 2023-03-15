<template>
    <App :currentUser="currentUser">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md bg-white sm:rounded-lg">
                <div class="px-6 py-4">
                    <h2 class="text-2xl font-bold mb-4">Create New Book</h2>
                    <form>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                                <input type="text" id="title" v-model="form.title"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="releaseDate" class="block text-gray-700 font-bold mb-2">Release
                                    Date:</label>
                                <input type="date" id="releaseDate" v-model="form.releaseDate"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                                <textarea id="description" v-model="form.description" rows="4"
                                          class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                            <div>
                                <label for="isbn" class="block text-gray-700 font-bold mb-2">ISBN:</label>
                                <input type="text" id="isbn" v-model="form.isbn"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="format" class="block text-gray-700 font-bold mb-2">Format:</label>
                                <input type="text" id="format" v-model="form.format"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="pages" class="block text-gray-700 font-bold mb-2">Pages:</label>
                                <input type="number" id="pages" v-model="form.pages"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="author" class="block text-gray-700 font-bold mb-2">Author:</label>
                                <select id="author" v-model="form.authorId"
                                        class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option v-for="author in authors" :key="author.id" :value="author.id">
                                        {{ author.firstName }} {{ author.lastName }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <Link href="/books"
                                  as="button"
                                  method="post"
                                  :data="form"
                                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                                Create
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </App>
</template>

<script setup>
import {ref} from "vue";
import {Link} from "@inertiajs/vue3";
import App from "@/Layouts/App.vue";

defineProps({
    'authors': Array,
    'currentUser': Object,
})

const form = ref({
    title: '',
    releaseDate: '',
    description: '',
    isbn: '',
    format: '',
    pages: 0,
    authorId: 0,
});
</script>