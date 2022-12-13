<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import {truncate} from 'lodash';
import DangerButton from '@/Components/DangerButton.vue';

const deleteCompany = id => useForm().delete(route('companies.delete', id));

</script>

<template>
    <Head :title="$page.props.company.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $page.props.company.name }} - {{ $page.props.vacancy_quantity }} vacancies</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul class="list-none">
                            <li><strong>Phone:</strong> {{ $page.props.company.phone_number }}</li>
                            <li><strong>Website:</strong> {{ $page.props.company.website }}</li>
                            <li><strong>Address:</strong> {{ $page.props.company.address }}</li>
                        </ul>

                        <div v-if="$page.props.auth.user.role === 'admin'" class="mt-3">
                            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3"
                                  :href="route('companies.update', $page.props.company.id)">Edit</Link>
                            <DangerButton @click="() => deleteCompany($page.props.company.id)">Delete</DangerButton>
                        </div>
                    </div>
                </div>
                <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-dark-600 mt-5 mb-4">Vacancies ({{ $page.props.vacancy_quantity }})</h3>

                <Link v-for="vacancy in $page.props.vacancies" :href="route('vacancies.show', vacancy.id)" class="block mt-2 p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ vacancy.title }}</h5>
                    <div class="font-normal text-gray-700 dark:text-gray-400">
                        {{ truncate(vacancy.text, {length: 300}) }}
                    </div>
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
