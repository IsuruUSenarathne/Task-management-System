<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Task
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div class="">
                            <label for="options"></label>
                        </div>
                        <div class="">
                            <a href="#" class="font-medium text-blue-600 hover:underline">
                            </a>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50"></thead>
                            <tbody></tbody>
                        </table>
                        <div class="">
                            <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="text-2xl py-4 px-6 text-black text-center font-bold uppercase">
                                    Task Details
                                </div>
                                <form class="py-4 px-6" action="" method="POST">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="Task title">
                                            Task Title
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="name" type="text" placeholder="Enter your Task title" />
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="date">
                                            Date
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="date" type="date" placeholder="Select a date" />
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="Status">
                                            Status
                                        </label>
                                        <select
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="status" name="Status">
                                            <option value="Pending">
                                                Pending
                                            </option>
                                            <option value="Completed">
                                                Completed
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="Description">
                                            Description
                                        </label>
                                        <textarea
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="message" rows="4"
                                            placeholder="Enter any description about the task"></textarea>
                                    </div>
                                    <div class="flex items-center justify-center mb-4">
                                        <button
                                            class="bg-gray-900 text-black py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                                            type="submit">
                                            Edit Task
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
