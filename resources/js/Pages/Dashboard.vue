<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const tasks = ref([]);
const pagination = ref({
    current_page: 1,
    last_page: 1,
});
const deleteTask = async (id) => {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Get the CSRF token
        
        const response = await fetch(`/api/task/${id}/delete`, {
            method: 'DELETE',
            headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
        }); // Adjust the endpoint as needed
        if (response.ok) {
            // Filter out the deleted task from the tasks array
            tasks.value = tasks.value.filter(task => task.id !== id);
        }
    } catch (error) {
        console.error('Error deleting tasks:', error);
    }
};

// Fetch tasks from the backend
const fetchTasks = async (page = 1) => {
    try {
        const response = await fetch(`/api/task/list?page=${page}`);
        const data = await response.json();
        
        // Update tasks and pagination info
        tasks.value = data.data; // Access the tasks array in paginated response
        pagination.value = {
            current_page: data.current_page,
            last_page: data.last_page,
        };
    } catch (error) {
        console.error('Error fetching tasks:', error);
    }
};

const goToPage = (page) => {
    fetchTasks(page);
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
                                        <a :href="route('task.edit', { id: task.id })" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <button @click="deleteTask(task.id)"
                                            class="font-medium text-red-600 hover:underline">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination">
        <button
            :disabled="pagination.current_page === 1"
            @click="goToPage(pagination.current_page - 1)"
            class="px-4 py-2 text-gray-600 disabled:opacity-50"
        >
            Previous
        </button>

        <span class="mx-2">
            Page {{ pagination.current_page }} of {{ pagination.last_page }}
        </span>

        <button
            :disabled="pagination.current_page === pagination.last_page"
            @click="goToPage(pagination.current_page + 1)"
            class="px-4 py-2 text-gray-600 disabled:opacity-50"
        >
            Next
        </button>
    </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
