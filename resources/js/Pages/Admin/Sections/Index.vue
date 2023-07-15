<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { usePermission } from "@/composables/permissions";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Alerts from "@/Components/Alerts.vue";
defineProps(["sections"]);
const form = useForm({});

const showConfirmDeletePostModal = ref(false);
const { hasPermission } = usePermission();

const confirmDeletePost = () => {
    showConfirmDeletePostModal.value = true;
};

const closeModal = () => {
    showConfirmDeletePostModal.value = false;
};

const deletePost = (id) => {
    form.delete(route("sections.destroy", id), {
        onSuccess: () => closeModal(),
    });
};
</script>

<template>
    <Head title="Sections List" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Sections List</h1>
                <Link
                    :href="route('sections.create')"
                    class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
                >New Section</Link>
            </div>
            <Alerts v-if="$page.props.flash.title" :title="$page.props.flash.title" :message="$page.props.flash.message"/>
            <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Section (English)</TableHeaderCell>
                            <TableHeaderCell>Section (Urdu)</TableHeaderCell>
                            <TableHeaderCell>Action</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="section in sections"
                            :key="section.id"
                            class="border-b"
                        >
                            <TableDataCell>{{ section.id }}</TableDataCell>
                            <TableDataCell>{{ section.section_e }}</TableDataCell>
                            <TableDataCell class="font-urdu" dir="rtl">{{ section.section_u }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="route('sections.edit', section.id)"
                                    class="text-green-400 hover:text-green-600"
                                >Edit</Link>
                                <button
                                    @click="confirmDeletePost"
                                    class="text-red-400 hover:text-red-600"
                                >
                                    Delete
                                </button>
                                <Modal
                                    :show="showConfirmDeletePostModal"
                                    @close="closeModal"
                                >
                                    <div class="p-6">
                                        <h2
                                            class="text-lg font-semibold text-slate-800"
                                        >
                                            Are you sure to delete this Section?
                                        </h2>
                                        <div class="mt-6 flex space-x-4">
                                            <DangerButton
                                                @click="deletePost(section.id)"
                                                >Delete</DangerButton
                                            >
                                            <SecondaryButton @click="closeModal"
                                                >Cancel</SecondaryButton
                                            >
                                        </div>
                                    </div>
                                </Modal>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
