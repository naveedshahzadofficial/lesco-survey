<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    section_e: "",
    section_u: "",
    section_desc_e: "",
    section_desc_u: "",
});
</script>

<template>
  <Head title="Add Section" />

  <AdminLayout>
    <div class="max-w-7xl mx-auto py-4">
      <div class="flex justify-between">
        <Link
          :href="route('sections.index')"
          class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
          >Back</Link
        >
      </div>
      <div class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-indigo-700">Add Section</h1>
        <form @submit.prevent="form.post(route('sections.store'))">
          <div class="mt-4">
            <InputLabel for="section_e" value="Section (English)" />
            <TextInput
              id="section_e"
              type="text"
              class="mt-1 block w-full"
              v-model="form.section_e"
              autofocus
              autocomplete="section_e"
            />
            <InputError class="mt-2" :message="form.errors.section_e" />
          </div>
            <div class="mt-4">
                <InputLabel for="section_u" value="Section (Urdu)" />
                <TextInput
                    id="section_u"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.section_u"
                    autofocus
                    autocomplete="section_u"
                />
                <InputError class="mt-2" :message="form.errors.section_u" />
            </div>

            <div class="mt-4">
                <InputLabel for="section_desc_e" value="Section Description (English)" />
                <TextInput
                    id="section_desc_e"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.section_desc_e"
                    autofocus
                    autocomplete="section_desc_e"
                />
                <InputError class="mt-2" :message="form.errors.section_desc_e" />
            </div>

            <div class="mt-4">
                <InputLabel for="section_desc_u" value="Section Description (Urdu)" />
                <TextInput
                    id="section_desc_u"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.section_desc_u"
                    autofocus
                    autocomplete="section_desc_u"
                />
                <InputError class="mt-2" :message="form.errors.section_desc_u" />
            </div>

          <div class="flex items-center mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Create
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AdminLayout>
</template>
