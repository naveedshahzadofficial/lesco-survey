<script setup>
import {useForm, } from "@inertiajs/vue3";
import {onMounted, ref} from "vue";

const props = defineProps({
   sections: {type: Object,  required: true}
});
const isUrdu = ref(true);

const form = useForm({
    options:[],
});

onMounted(() => {
    props.sections.forEach((section) => {
        section.questions.forEach((question) => {
            form.options.push({section_id: section.id, question_id: question.id, option_id: '',option_other: '',});
        })
    })
});


const translate = () => isUrdu.value = !isUrdu.value;
</script>

<template>
    <div :dir="isUrdu ? 'rtl' : 'ltr'" class="bg-white border rounded-lg px-8 py-6 mx-auto my-8 max-w-2xl">
        <button @click.prevent="translate" type="button" class="py-2 px-4 inline-block text-center mb-4 rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0" v-html="isUrdu?'English':'اردو'"/>
        <h2 class="text-2xl font-medium mb-4 font-urdu leading-[2]">لاہور الیکٹرسٹی سپلائی کمپنی کے کارکنوں میں پیشہ ورانہ حفاظت اور رسک مینجمنٹ کے طریقوں کا جائزہ</h2>
        <form>
            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-medium mb-3 font-urdu">دفتر کا مقام</label>
                <input type="text" id="location" name="location" class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-gray-700 font-medium mb-2 font-urdu">ملازمت کا عنوان</label>
                <input type="text" id="designation" name="designation" class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
            </div>
            <template v-for="section in sections" :key="section.id">
                <h2 class="mb-2 text-xl leading-normal text-center text-gray-800 dark:text-gray-300 font-urdu" v-html="isUrdu?section.section_u:section.section_e"/>
                <hr class="mb-4 block w-12 h-0.5 mx-auto my-5 bg-indigo-500 border-indigo-500">
                <template v-for="question in section.questions" :key="question.id">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2 font-urdu" v-html="isUrdu?question.question_u:question.question_e"/>
                        <div class="flex flex-wrap -mx-2">
                            <template v-for="option in question.options" :key="option.id">
                                <div class="px-2" :class="option.is_other?'w-1/2 flex flex-column justify-items-center gap-x-2':'w-1/4'">
                                    <label :for="'option-'+option.id" class="block text-gray-700 font-medium mb-2 font-urdu" :class="{'flex-none': option.is_other}">
                                        <input  type="radio" :id="'option-'+option.id" :name="'question-'+question.id"  :value="option.id" :class="isUrdu?'ml-2':'mr-2'">{{ isUrdu?option.option_u:option.option_e }}
                                    </label>
                                    <input v-if="option.is_other"  type="text"  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                                </div>
                            </template>
                        </div>
                    </div>

                </template>

            </template>


            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2 font-urdu">جنس</label>
                <div class="flex flex-wrap -mx-2">
                    <div class="px-2 w-1/3">
                        <label for="color-red" class="block text-gray-700 font-medium mb-2 font-urdu">
                            <input type="radio" id="color-red" name="color" value="red" class="ml-2">مرد
                        </label>
                    </div>
                    <div class="px-2 w-1/3">
                        <label for="color-blue" class="block text-gray-700 font-medium mb-2 font-urdu">
                            <input type="radio" id="color-blue" name="color" value="blue" class="ml-2">عورت
                        </label>
                    </div>
                    <div class="px-2 w-1/3">
                        <label for="color-green" class="block text-gray-700 font-medium mb-2">
                            <input type="radio" id="color-green" name="color" value="green" class="mr-2">Green
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">What is your favorite animal?</label>
                <div class="flex flex-wrap -mx-2">
                    <div class="px-2 w-1/3">
                        <label for="animal-cat" class="block text-gray-700 font-medium mb-2">
                            <input type="checkbox" id="animal-cat" name="animal[]" value="cat" class="mr-2">Cat
                        </label>
                    </div>
                    <div class="px-2 w-1/3">
                        <label for="animal-dog" class="block text-gray-700 font-medium mb-2">
                            <input type="checkbox" id="animal-dog" name="animal[]" value="dog"
                            class="mr-2">Dog
                        </label>
                    </div>
                    <div class="px-2 w-1/3">
                        <label for="animal-bird" class="block text-gray-700 font-medium mb-2">
                            <input type="checkbox" id="animal-bird" name="animal[]" value="bird" class="mr-2">Bird
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                <textarea id="message" name="message"
                          class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" rows="5"></textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
            </div>

        </form>
    </div>
</template>

<style scoped>

</style>
