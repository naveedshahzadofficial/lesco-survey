<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    },
    index: {
        default: null,
    },
    name: {
        default: null,
    },
    label: {
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <div class="flex items-center mr-4">
        <input :id="`question-type-${index}`"
               :value="value"
               v-model="proxyChecked"
               :name="name"
               type="radio"
               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label :for="`question-type-${index}`" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ label }}</label>
    </div>
</template>
