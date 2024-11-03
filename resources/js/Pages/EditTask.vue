<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';



const form = useForm({
    title: '',
    status: '',
    description: '',
});

const submit = () => {
    form.post('/api/task/add', {
        onFinish: () => form.reset('title', 'status', 'description'),
    });
};

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

                        </div>
                        <div class="">
                            <a href="#" class="font-medium text-blue-600 hover:underline">

                            </a>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="">
                            <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
                                <div class="text-2xl py-4 px-6  text-black text-center font-bold uppercase">
                                    Create Task
                                </div>
                                <form class="py-4 px-6 space-y-3" @submit.prevent="submit">

                                    <div>
                                        <InputLabel for="title" value="Task Title" />
                                        <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                                            required autofocus autocomplete="title" />
                                        <InputError class="mt-2" :message="form.errors.title" />
                                    </div>


                                    <div class="mb-4">
                                        <InputLabel for="status" value="Status" />
                                        <select
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                                            id="status" name="Status" v-model="form.status">
                                            <option value="Pending">Pending</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                        <InputError class="mt-2" :message="form.errors.status" />
                                    </div>


                                    <div class="mb-4">
                                        <InputLabel for="description" value="Description" />
                                        <textarea
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                                            id="message" rows="4"
                                            placeholder="Enter any description about the task" v-model="form.description"></textarea>
                                        <InputError class="mt-2" :message="form.errors.description" />
                                    </div>
                                    <div class="flex items-center justify-center mb-4">
                                        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                            :disabled="form.processing">
                                            Add Task
                                        </PrimaryButton>
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
