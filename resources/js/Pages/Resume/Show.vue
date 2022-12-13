<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import {truncate} from 'lodash';
import DangerButton from '@/Components/DangerButton.vue';

const deleteResume = id => useForm().delete(route('resumes.delete', id));

</script>

<template>
    <Head :title="$page.props.resume.job" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $page.props.resume.job }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p v-if="$page.props.resume.text">{{ $page.props.resume.text }}</p>
                        <a v-if="$page.props.resume.file" target="_blank" class="text-red-500" download :href="$page.props.resume.file">Download file!</a>

                        <div v-if="$page.props.auth.user.role === 'admin' || $page.props.resume.user_id === $page.props.auth.user.id"  class="mt-3">
                            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3"
                                  :href="route('resumes.update', $page.props.resume.id)">Edit</Link>
                            <DangerButton @click="() => deleteResume($page.props.resume.id)">Delete</DangerButton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
