<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Gender', 'question_u'=>'جنس']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Male', 'option_u'=>'مرد', 'is_other'=>0]),
            new Option(['option_e'=> 'Female', 'option_u'=>'عورت', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Marital Status', 'question_u'=>'ازدواجی حیثیت']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Single', 'option_u'=>'غیر شادی شدہ', 'is_other'=>0]),
            new Option(['option_e'=> 'Married', 'option_u'=>'شادی شدہ', 'is_other'=>0]),
            new Option(['option_e'=> 'Other ', 'option_u'=>'دیگر', 'is_other'=>1]),
        ]);
        Question::create(['section_id'=>1, 'question_e'=> 'Age (Years)', 'question_u'=>'عمر (سال)', 'question_type'=>'TextField']);
        Question::create(['section_id'=>1, 'question_e'=> 'Qualification', 'question_u'=>'تعلیم', 'question_type'=>'TextField']);

        $question = Question::create(['section_id'=>1, 'question_e'=> 'Cigarette smoking', 'question_u'=>'سگریٹ پینا']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Smoker', 'option_u'=>'تمباکو نوشی', 'is_other'=>0]),
            new Option(['option_e'=> 'Occasional smoker', 'option_u'=>'کبھی کبھار سگریٹ نوشی', 'is_other'=>0]),
            new Option(['option_e'=> 'Quit smoking', 'option_u'=>'تمباکو نوشی چھوڑ دی ہے', 'is_other'=>0]),
            new Option(['option_e'=> 'Never smoke', 'option_u'=>'کبھی سگریٹ نوشی نہیں کی۔', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Monthly income', 'question_u'=>'ماہانہ آمدنی']);
        $question->options()->saveMany([
            new Option(['option_e'=> '< 30,000', 'option_u'=>'30,000سے کم', 'is_other'=>0]),
            new Option(['option_e'=> '30,000-45,000', 'option_u'=>'30,000-45,000', 'is_other'=>0]),
            new Option(['option_e'=> '46,000-70,000', 'option_u'=>'46,000-70,000', 'is_other'=>0]),
            new Option(['option_e'=> '> 70,000', 'option_u'=>'70,000 سے زیادہ', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Any disease diagnosed (Sugar, BP etc.)', 'question_u'=>'کسی بھی بیماری کی تشخیص (شوگر، بی پی وغیرہ)']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Yes', 'option_u'=>'جی ہاں', 'is_other'=>0]),
            new Option(['option_e'=> 'No', 'option_u'=>'نہیں', 'is_other'=>0]),
            new Option(['option_e'=> 'If Yes, Please describe', 'option_u'=>'اگر ہاں، تو براہ کرم بیان کریں', 'is_other'=>1]),
       ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'How many days a week do you spend at workplace?', 'question_u'=>'آپ ہفتے میں کتنے دن کام کرتے ہیں؟']);
        $question->options()->saveMany([
            new Option(['option_e'=> '5 days', 'option_u'=>'5 دن', 'is_other'=>0]),
            new Option(['option_e'=> '6 days', 'option_u'=>'6 دن', 'is_other'=>0]),
            new Option(['option_e'=> '7 days', 'option_u'=>'7 دن', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Work Experience ', 'question_u'=>'کام کا تجربہ']);
        $question->options()->saveMany([
            new Option(['option_e'=> '1-5 yrs', 'option_u'=>'1-5 سال', 'is_other'=>0]),
            new Option(['option_e'=> '5-15 yrs', 'option_u'=>'5-15 سال', 'is_other'=>0]),
            new Option(['option_e'=> '15-25 yrs', 'option_u'=>'15-25 سال', 'is_other'=>0]),
            new Option(['option_e'=> '>25 yrs', 'option_u'=>'25 سال سے زیادہ', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Current designation for', 'question_u'=>'موجودہ عہدہ']);
        $question->options()->saveMany([
            new Option(['option_e'=> '< 1 yrs', 'option_u'=>'< 1 سال', 'is_other'=>0]),
            new Option(['option_e'=> '1-5 yrs', 'option_u'=>'1-5 سال', 'is_other'=>0]),
            new Option(['option_e'=> '6-10 yrs', 'option_u'=>'6-10 سال', 'is_other'=>0]),
            new Option(['option_e'=> '>10 yrs', 'option_u'=>'10 سال سے زیادہ', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Weekly over time', 'question_u'=>'ہفتے میں اوور ٹائم']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Yes', 'option_u'=>'جی ہاں', 'is_other'=>0]),
            new Option(['option_e'=> 'No', 'option_u'=>'نہیں', 'is_other'=>0]),
            new Option(['option_e'=> 'If YES please describe the Weekly Hours for overtime', 'option_u'=>'اگر ہاں تو براہ کرم اوور ٹائم کے ہفتہ وار اوقات کی وضاحت کریں', 'is_other'=>1]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Less Workers for Responding Breakdown', 'question_u'=>'خرابی کی صورت میں وہاں پر ملازمین موجود ہوتے ہیں']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Never', 'option_u'=>'کبھی نہیں', 'is_other'=>0]),
            new Option(['option_e'=> 'Occasionally', 'option_u'=>'کبھی کبھار', 'is_other'=>0]),
            new Option(['option_e'=> 'Frequently', 'option_u'=>'زیادہ تر', 'is_other'=>0]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Witness any occupational accident', 'question_u'=>'کام کی جگہ پر حادثہ']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Yes', 'option_u'=>'جی ہاں', 'is_other'=>0]),
            new Option(['option_e'=> 'No', 'option_u'=>'نہیں', 'is_other'=>0]),
            new Option(['option_e'=> 'Describe the accident type', 'option_u'=>'حادثے کی قسم بیان کریں', 'is_other'=>1]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Safety Training ', 'question_u'=>'سیفٹی ٹریننگ']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Yes', 'option_u'=>'جی ہاں', 'is_other'=>0]),
            new Option(['option_e'=> 'No', 'option_u'=>'نہیں', 'is_other'=>0]),
            new Option(['option_e'=> 'If YES, please provide training YEAR', 'option_u'=>'اگر ہاں، تو براہ کرم تربیت کا سال فراہم کریں', 'is_other'=>1]),
        ]);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Tool Box Talk', 'question_u'=>'ٹول باکس ٹاک']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Yes', 'option_u'=>'جی ہاں', 'is_other'=>0]),
            new Option(['option_e'=> 'No', 'option_u'=>'نہیں', 'is_other'=>0]),
            new Option(['option_e'=> 'Given by:', 'option_u'=>'کس کی طرف سے دیا گیا:', 'is_other'=>1]),
        ]);

        $question = Question::create(['section_id'=>2, 'question_e'=> 'Tries to continually improve safety levels in each department.', 'question_u'=>'ہر شعبہ میں حفاظت کی سطح کو مسلسل بہتر بنانے کی کوشش کرتے ہیں ۔']);
        $question->options()->saveMany([
            new Option(['option_e'=> 'Strongly Disagree', 'option_u'=>'بہت زیادہ اختلاف', 'is_other'=>0]),
            new Option(['option_e'=> 'Disagree', 'option_u'=>'اختلاف کرنا', 'is_other'=>0]),
            new Option(['option_e'=> 'Neutral', 'option_u'=>'غیر جانبدار', 'is_other'=>0]),
            new Option(['option_e'=> 'Agree', 'option_u'=>'متفق', 'is_other'=>0]),
            new Option(['option_e'=> 'Strongly agree', 'option_u'=>'بہت زیادہ اتفاق', 'is_other'=>0]),
        ]);

        $question = Question::create(['section_id'=>2, 'question_e'=> 'Tries to continually improve safety levels in each department.', 'question_u'=>'ہر شعبہ میں حفاظت کی سطح کو مسلسل بہتر بنانے کی کوشش کرتے ہیں ۔']);


    }
}
