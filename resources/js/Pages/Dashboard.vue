<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const tasks = ref([]); // To hold the list of tasks

// Fetch tasks from the backend
const fetchTasks = async () => {
    try {
        const response = await fetch('/api/task'); // Adjust the endpoint as needed
        const data = await response.json();
        tasks.value = data; // Assign the fetched tasks to the tasks array
    } catch (error) {
        console.error('Error fetching tasks:', error);
    }
};

// Call fetchTasks when the component is mounted
onMounted(() => {
    fetchTasks();
});
</script>


<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div class="">
                            <label for="options"></label>
                            <select id="options" name="status">
                                <option value="option1">All</option>
                                <option value="option2">Pending</option>
                                <option value="option3">Completed</option>

                            </select>
                        </div>
                        <div class="">
                            <a href="/add" class="font-medium text-blue-600 hover:underline">
                                +New Tasks
                            </a>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Task Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Task Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b hover:bg-gray-50" v-for="task in tasks" :key="task.id">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ task.title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ task.description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ task.status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ task.created_at }}
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="">
                            <a href="#" class="font-medium text-blue-600 hover:underline">
                                <button type="button">>>
                                    <div class="container">
                                        <div class="container">
                                        </div>
                                    </div>

                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
