<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
   sections: {type: Object,  required: true}
});
const isUrdu = ref(true);
const options = ref([]);
const otherOptions = ref([]);
const form = useForm({
    options: []
});
const translate = () => isUrdu.value = !isUrdu.value;

const findQuestion = (question_id) => {
    for (const section of props.sections) {
        for (const question of section.questions) {
            if (question.id === question_id) {
                return question;
            }
        }
    }
    return null;
}
const submit = () => {

    form.options = options.value.map(function (val,key){
        const question = findQuestion(key);
        if(question.question_type === 'Radio'){
          const other_option = otherOptions.value.find((_val,_index) => _index === key);
          return { question_id: key,  option_id: val, option_other: other_option!==undefined?other_option:'' }
        }else if(question.question_type === 'TextField'){
         return { question_id: key,  option_id: null, option_other: val }
        }
    }).filter(val => val !== null);


    // error show...
    form.post(route('survey.store'))
}
</script>

<template>
    <Head title="Survey" />

    <AuthenticatedLayout>
    <div :dir="isUrdu ? 'rtl' : 'ltr'" class="bg-white border rounded-lg px-10 py-6 mx-auto my-8 max-w-full">
        <button @click.prevent="translate" type="button" class="py-2 px-4 inline-block text-center mb-4 rounded leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0" v-html="isUrdu?'English':'اردو'"/>
        <h2 class="text-2xl font-medium mb-4 font-urdu leading-[2] text-center" v-if="isUrdu">لاہور الیکٹرسٹی سپلائی کمپنی کے کارکنوں میں پیشہ ورانہ حفاظت اور رسک مینجمنٹ کے طریقوں کا جائزہ</h2>
        <h2 class="text-2xl font-medium mb-4 text-center" v-else="isUrdu">Assessment of Occupational Safety and Risk Management Practices among Workers of Lahore Electricity Supply Company</h2>
        <form @submit.prevent="submit">
            <div class="mb-4 flex justify-between">
                <div>
                    <label :class="{ isUrdu: 'font-urdu'}" class="text-gray-700 font-medium mb-3"  >{{ isUrdu? 'دفتر کا مقام:': 'Office Location:'}}</label>
                    <span class="p-2 font-semibold">{{ $page.props.auth.user.job_title }}</span>
                </div>
                <div>
                    <label :class="{ isUrdu: 'font-urdu'}" class="text-gray-700 font-medium mb-2">{{ isUrdu? 'ملازمت کا عنوان:': 'Job Title'}}</label>
                    <span class="p-2 font-semibold">{{ $page.props.auth.user.office_location }}</span>

                </div>
            </div>
            <template v-for="section in sections" :key="section.id">
                <h2 class="mb-2 text-xl leading-normal text-center text-gray-800 dark:text-gray-300 font-urdu" v-html="isUrdu?section.section_u:section.section_e"/>
                <hr class="mb-4 block w-12 h-0.5 mx-auto my-5 bg-indigo-500 border-indigo-500">
                <template v-for="question in section.questions" :key="question.id">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2 font-urdu" v-html="isUrdu?question.question_u:question.question_e"/>
                        <div class="flex flex-wrap -mx-2 mt-3">
                            <template v-if="question.question_type==='Radio'" v-for="option in question.options" :key="option.id">
                                <div class="px-2" :class="option.is_other?'lg:w-1/2 lg:flex lg:flex-column justify-items-center gap-x-2':'lg:w-1/4'">
                                    <label :for="'option-'+option.id" class="block text-gray-700 font-medium mb-2 font-urdu" :class="{'flex-none': option.is_other}">
                                        <input  type="radio" :id="'option-'+option.id" :name="'question-'+question.id"  :value="option.id" :class="isUrdu?'ml-2':'mr-2'" v-model="options[question.id]" >{{ isUrdu?option.option_u:option.option_e }}
                                    </label>
                                    <input v-if="option.is_other"  type="text"  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" v-model="otherOptions[question.id]" >
                                </div>
                            </template>
                            <template v-else-if="question.question_type==='TextField'">
                                <input type="text"  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" v-model="options[question.id]" >
                            </template>

                        </div>
                    </div>
                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                </template>

            </template>

            <div>
                <button  :disabled="form.processing" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
            </div>

        </form>
    </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
