<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm, usePage} from '@inertiajs/inertia-vue3';

const resume = usePage().props.value.resume;
const form = useForm({
    job: resume.job,
    text: resume.text,
    file: resume.file
});

</script>

<template>
    <Head title="Create resume" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit resume</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-2">
                    <div>
                        <aside class="w-64" aria-label="Sidebar">
                            <div class="overflow-y-auto py-4 px-3 rounded">
                                <ul class="space-y-2">
                                    <li>
                                        <Link :href="route('resumes.list')" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                                            <span class="flex-1 ml-3 whitespace-nowrap">List</span>
                                            <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">
                                                {{ $page.props.quantity }}
                                            </span>
                                        </Link>
                                    </li>
                                    <li>
                                        <Link :href="route('resumes.create')" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                            <span class="flex-1 ml-3 whitespace-nowrap">Create</span>
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="col-span-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">Edit resume form</h2>
                            </header>

                            <form @submit.prevent="form.patch(route('resumes.update', $page.props.resume.id))" class="mt-6 space-y-6">
                                <div>
                                    <InputLabel for="job" value="Job" />

                                    <TextInput
                                        id="job"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.job"
                                        required
                                        autofocus
                                        autocomplete="job"
                                    />

                                    <InputError class="mt-2" :message="form.errors.job" />
                                </div>

                                <div>
                                    <InputLabel for="text" value="Text" />

                                    <TextInput
                                        id="text"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.text"
                                        autocomplete="text"
                                    />

                                    <InputError class="mt-2" :message="form.errors.text" />
                                </div>

                                <div>
                                    <InputLabel for="file" value="File" />

                                    <TextInput
                                        id="file"
                                        type="file"
                                        class="mt-1 block w-full"
                                        @input="form.file = $event.target.files[0]"
                                        autocomplete="file"
                                    />

                                    <InputError class="mt-2" :message="form.errors.file" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                    <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                    </Transition>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
