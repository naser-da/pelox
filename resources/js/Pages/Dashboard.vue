<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateRoomForm from './Room/Partials/CreateRoomForm.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12 ">
            <div class="my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                    <CreateRoomForm  />

            </div>
        </div>


        

    </AuthenticatedLayout>
</template>
