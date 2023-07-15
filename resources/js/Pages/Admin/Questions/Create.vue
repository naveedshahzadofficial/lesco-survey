<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import {ref} from "vue";
defineProps({
    sections: { required: true, type: Array}
});
const questionTypes = ref(['Radio', 'Checkbox', 'TextField']);

const option = useForm({
    option_e: null,
    option_u: null,
    is_other: null,
});

const form = useForm({
    section_id: "",
    question_type: "",
    question_e: "",
    question_u: "",
    options: [],
});

const addOption = () => {
    option.clearErrors();
    const row = option.data();
    if(row.option_e === null)
        option.setError("option_e", "Option (English) is required.");
    if(row.option_u === null)
        option.setError("option_u", "Option (Urdu) is required.");

    if(row.option_e === null || row.option_u === null)
        return;

    form.options.push(row)
    option.reset();
}

const deleteOption = (optionIndex) => {
    form.options.splice(optionIndex, 1);
}

</script>

<template>
  <Head title="Add Section" />

  <AdminLayout>
    <div class="max-w-7xl mx-auto py-4">
      <div class="flex justify-between">
        <Link
          :href="route('questions.index')"
          class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
          >Back</Link
        >
      </div>
      <div class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-indigo-700">Add Question</h1>
        <form @submit.prevent="form.post(route('questions.store'))">

            <div class="mt-4">
                <InputLabel for="section_id" value="Section" />
                <select v-model="form.section_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select Section</option>
                    <template v-for="section in sections" :key="section.id">
                        <option  :value="section.id">{{ section.section_e }} - {{ section.section_u}}</option>
                    </template>
                </select>
                <InputError class="mt-2" :message="form.errors.section_id" />
            </div>


            <div class="mt-4">
                <InputLabel for="question_type" value="Question Type" />
                <div class="flex">
                <template v-for="(questionType, index) in questionTypes">
                    <div class="flex items-center mr-4">
                        <input :id="`question-type-${index}`"
                               :value="questionType"
                               v-model="form.question_type"
                               name="question-type-group"
                               type="radio"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label :for="`question-type-${index}`" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ questionType }}</label>
                    </div>
                </template>
                </div>
                <InputError class="mt-2" :message="form.errors.question_type" />
            </div>

          <div class="mt-4">
            <InputLabel for="question_e" value="Question (English)" />
            <TextInput
              id="question_e"
              type="text"
              class="mt-1 block w-full"
              v-model="form.question_e"
              autofocus
              autocomplete="question_e"
            />
            <InputError class="mt-2" :message="form.errors.question_e" />
          </div>
            <div class="mt-4">
                <InputLabel for="question_u" value="Question (Urdu)" />
                <TextInput
                    id="question_u"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.question_u"
                    autofocus
                    autocomplete="question_u"
                />
                <InputError class="mt-2" :message="form.errors.question_u" />
            </div>
        <template v-if="form.question_type === 'Radio' || form.question_type === 'Checkbox'">
            <h1 class="text-xl font-semibold text-indigo-700 mt-4">Options</h1>

            <div class="mt-4">
                <div class="flex">
                    <div class="flex flex-col grow mr-4">
                        <InputLabel for="option_e" value="Option (English)" />
                        <TextInput
                            id="option_e"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="option.option_e"
                            autofocus
                            autocomplete="option_1"
                        />
                        <InputError class="mt-2" :message="option.errors.option_e" />
                    </div>

                    <div class="flex flex-col grow mr-4">
                        <InputLabel for="option_u" value="Option (Urdu)" />
                        <TextInput
                            id="option_u"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="option.option_u"
                            autofocus
                            autocomplete="option_1"
                        />
                        <InputError class="mt-2" :message="option.errors.option_u" />
                    </div>

                    <div class="flex grow-0 items-center mr-4">
                        <Checkbox
                            class="mr-2"
                            id="is_other"
                            v-model="option.is_other"
                        />
                        <InputLabel for="is_other" value="Is Other" />
                        <InputError class="mt-2" :message="option.errors.is_other" />
                    </div>

                    <div class="flex grow-0 items-center mr-4">
                        <SecondaryButton class="ml-4" @click.prevent="addOption">Add</SecondaryButton>
                    </div>

                  </div>
            </div>
            <div class="mt-4">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>No</TableHeaderCell>
                            <TableHeaderCell>Option (English)</TableHeaderCell>
                            <TableHeaderCell>Option (Urdu)</TableHeaderCell>
                            <TableHeaderCell>Other Option</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="(option, index) in form.options"
                            :key="index"
                            class="border-b"
                        >
                            <TableDataCell>{{ index+1 }}</TableDataCell>
                            <TableDataCell>{{ option.option_e }}</TableDataCell>
                            <TableDataCell class="font-urdu" dir="rtl">{{ option.option_u }}</TableDataCell>
                            <TableDataCell>{{ option.is_other?'Yes':'No' }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <button
                                    @click="deleteOption(index)"
                                    class="text-red-400 hover:text-red-600"
                                >
                                    Delete
                                </button>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>

            </div>
        </template>

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
