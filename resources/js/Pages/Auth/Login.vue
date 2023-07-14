<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    phone_no: '',
    job_title: '',
    office_location: '',
});

const submit = () => {
    form.post(route('register'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="phone_no" value="Mobile No." />

                <TextInput
                    id="phone_no"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.phone_no"
                    required
                    autocomplete="phone_no"
                />

                <InputError class="mt-2" :message="form.errors.phone_no" />
            </div>

            <div class="mt-4">
                <InputLabel for="job_title" value="Job Title" />

                <TextInput
                    id="job_title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.job_title"
                    required
                    autocomplete="job_title"
                />

                <InputError class="mt-2" :message="form.errors.job_title" />
            </div>

            <div class="mt-4">
                <InputLabel for="office_location" value="Office Location" />

                <TextInput
                    id="office_location"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.office_location"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.office_location" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Start Survey
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
