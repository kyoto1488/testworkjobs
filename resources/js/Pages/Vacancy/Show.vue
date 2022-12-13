<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import DangerButton from '@/Components/DangerButton.vue';
import { truncate } from 'lodash'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Status from '@/Components/Feedback/Status.vue';

const vacancy = usePage().props.value.vacancy;

const deleteVacancy = id => useForm().delete(route('vacancies.delete', id));
const createFeedbackForm = useForm({
    resume_id: null,
    vacancy_id: vacancy.id
});
</script>

<template>
    <Head :title="$page.props.vacancy.title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $page.props.vacancy.title }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>{{ $page.props.vacancy.text }}</p>
                        <Link class="block text-gray-400" :href="route('companies.show', $page.props.company.id)">
                            {{ $page.props.company.name }}
                        </Link>

                        <div v-if="$page.props.auth.user.role === 'admin'" class="mt-3">
                            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3"
                                  :href="route('vacancies.update', $page.props.vacancy.id)">Edit</Link>
                            <DangerButton @click="() => deleteVacancy($page.props.vacancy.id)">Delete</DangerButton>
                        </div>

                        <div v-if="$page.props.auth.user.role === 'user'" class="mt-3">
                            <div v-if="$page.props.feedback">
                                <h5>Sent resume: {{ $page.props.feedback.resume.job }}</h5>
                                <p v-if="$page.props.feedback.comment" class="text-gray-400">
                                    {{ $page.props.feedback.comment }}
                                </p>

                                <Status :value="$page.props.feedback.status"></Status>
                            </div>
                            <form v-else @submit.prevent="createFeedbackForm.post(route('feedbacks.create'))">
                                <input type="hidden" name="vacancy_id" v-model="createFeedbackForm.vacancy_id">
                                <div>
                                    <InputLabel for="title" value="Resume" />

                                    <select
                                        id="resume"
                                        name="resume_id"
                                        required
                                        v-model="createFeedbackForm.resume_id"
                                    >
                                        <option v-for="resume in $page.props.resumes" :value="resume.id">
                                            {{ truncate(resume.job, { length: 30 })}}
                                        </option>
                                    </select>

                                    <InputError class="mt-2" :message="createFeedbackForm.errors.resume_id" />
                                </div>

                                <div class="flex items-center gap-4 mt-3">
                                    <PrimaryButton :disabled="createFeedbackForm.processing">Send</PrimaryButton>

                                    <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                        <p v-if="createFeedbackForm.recentlySuccessful" class="text-sm text-gray-600">Sent.</p>
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
