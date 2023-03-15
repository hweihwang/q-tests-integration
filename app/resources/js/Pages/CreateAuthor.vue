<template>
    <App :currentUser="currentUser">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md bg-white sm:rounded-lg">
                <div class="px-6 py-4">
                    <h2 class="text-2xl font-bold mb-4">Create New Author</h2>
                    <form>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="firstname" class="block text-gray-700 font-bold mb-2">Firstname:</label>
                                <input type="text" id="firstname" v-model="form.firstName"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="lastName" class="block text-gray-700 font-bold mb-2">Lastname:</label>
                                <input type="text" id="lastName" v-model="form.lastName"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="birthday" class="block text-gray-700 font-bold mb-2">Birthday:</label>
                                <input type="date" id="birthday" v-model="form.birthday"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="gender" class="block text-gray-700 font-bold mb-2">Gender:</label>
                                <input type="text" id="gender" v-model="form.gender"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                            <div>
                                <label for="placeOfBirth" class="block text-gray-700 font-bold mb-2">Place of birth:</label>
                                <input type="text" id="placeOfBirth" v-model="form.placeOfBirth"
                                       class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <Link href="/authors"
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

const form = ref({
    firstName: '',
    lastName: '',
    birthday: '',
    gender: '',
    placeOfBirth: ''
});

defineProps({
    'currentUser': Object,
})
</script>