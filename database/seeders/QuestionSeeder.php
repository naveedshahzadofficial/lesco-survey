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
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Quickly corrects any safety hazard (even if it’s costly).', 'question_u'=>'کسی بھی حفاظتی خطرے کو فوری طور پر درست کرتے ہیں (چاہے یہ مہنگا ہی کیوں نہ ہو)۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Requires each manager to help improve safety in his or her department.', 'question_u'=>'ہر مینیجر سے اپنے محکمے میں حفاظت کو بہتر بنانے میں مدد کی ضرورت ہوتی ہے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Uses any available information to improve existing safety rules.', 'question_u'=>'موجودہ حفاظتی قواعد کو بہتر بنانے کے لیے کسی بھی دستیاب معلومات کا استعمال کرتے ہیں ۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Listens carefully to workers’ ideas about improving safety.', 'question_u'=>'حفاظت کو بہتر بنانے کے بارے میں ملازمین کے خیالات کو غور سے سنتے ہیں ۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Considers safety when setting production speed and schedules.', 'question_u'=>'پیداوار کی رفتار اور نظام الاوقات ترتیب دیتے وقت حفاظت پر غور کرتے ہیں ۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Provides workers with a lot of information on safety issues.', 'question_u'=>'ملازمین کو حفاظتی امور پر کافی معلومات فراہم کرتے ہیں ۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>2, 'question_e'=> 'Gives safety personnel the power they need to do their job.', 'question_u'=>'حفاظتی عملے کو وہ طاقت دیتا ہے جس کی انہیں اپنا کام کرنے کی ضرورت ہوتی ہے۔']);
        $this->commonOption($question);

        $question = Question::create(['section_id'=>3, 'question_e'=> 'makes sure we receive all the equipment needed to do the job safely', 'question_u'=>'اس بات کو یقینی بناتا ہے کہ ہمیں کام کو محفوظ طریقے سے کرنے کے لیے درکار تمام آلات مل جائیں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>3, 'question_e'=> 'frequently checks to see if we are all following the safety rules', 'question_u'=>'یہ دیکھنے کے لیے اکثر چیک کرتا ہے کہ آیا ہم سب حفاظتی اصولوں پر عمل کر رہے ہیں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>3, 'question_e'=> 'Discusses how to improve safety with us.', 'question_u'=>'ہمارے ساتھ حفاظت کو بہتر بنانے کے طریقے پر تبادلہ خیال کرتا ہے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>3, 'question_e'=> 'Uses explanations (not just compliance) to get us to act safely.', 'question_u'=>'ہمیں محفوظ طریقے سے کام کرنے کے لیے وضاحتیں (صرف تعمیل نہیں) استعمال کرتا ہے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>3, 'question_e'=> 'Reminds workers who need reminders to work safely.', 'question_u'=>'ان ملازمین کو یاد دلاتا ہے جنہیں محفوظ طریقے سے کام کرنے کے لیے یاد دہانیوں کی ضرورت ہوتی ہے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>3, 'question_e'=> 'Makes sure we follow all the safety rules (not just the most important ones).', 'question_u'=>'اس بات کو یقینی بناتا ہے کہ ہم تمام حفاظتی اصولوں پر عمل کرتے ہیں (صرف اہم ترین نہیں)۔']);
        $this->commonOption($question);

        $question = Question::create(['section_id'=>4, 'question_e'=> 'I know how to perform my job in a safe manner.', 'question_u'=>'میں جانتا ہوں کہ اپنے کام کو محفوظ طریقے سے کیسے انجام دینا ہے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>4, 'question_e'=> 'I know how to use safety equipment and SOPs.', 'question_u'=>'میں جانتا ہوں کہ حفاظتی آلات اور SOPs کا استعمال کیسے کرنا ہے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>4, 'question_e'=> 'I know how to reduce the risk of accidents and incidents in the workplace.', 'question_u'=>'میں جانتا ہوں کہ کام کی جگہ پر حادثات اور واقعات کے خطرے کو کیسے کم کیا جائے۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>4, 'question_e'=> 'I know what are the hazards associated with my jobs and the necessary precautions to be taken while doing my job.', 'question_u'=>'میں جانتا ہوں کہ میری ملازمتوں سے وابستہ خطرات کیا ہیں اور اپنا کام کرتے وقت ضروری احتیاطی تدابیر اختیار کرنی ہیں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>4, 'question_e'=> 'Have you ever gone through wihout work permit?', 'question_u'=>'کیا آپ کبھی کام کی جگہ پر بغیر اجازت کے گئے ہیں؟']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>4, 'question_e'=> 'Do you have training about first aid and emergency procedures in case of any hazard?', 'question_u'=>'کیا آپ کو کسی بھی خطرے کی صورت میں ابتدائی طبی امداد اور ہنگامی طریقہ کار کے بارے میں تربیت حاصل ہے؟']);
        $this->commonOption($question);

        $question = Question::create(['section_id'=>5, 'question_e'=> 'I use all necessary safety equipment to do my job.', 'question_u'=>'میں اپنا کام کرنے کے لیے تمام ضروری حفاظتی سامان استعمال کرتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>5, 'question_e'=> 'I carry out my work in a safe manner.', 'question_u'=>'میں اپنے کام کو محفوظ طریقے سے انجام دیتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>5, 'question_e'=> 'I follow correct safety rules and procedures while carrying out my job.', 'question_u'=>'میں اپنے کام کو انجام دیتے ہوئے صحیح حفاظتی اصولوں اور طریقہ کار پر عمل کرتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>5, 'question_e'=> 'I ensure the highest levels of safety when I carry out my job.', 'question_u'=>'جب میں اپنا کام انجام دیتا ہوں تو میں اعلیٰ ترین سطح کی حفاظت کو یقینی بناتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>5, 'question_e'=> 'Occasionally due to lack of time, I deviate from correct and safe work procedures.', 'question_u'=>'کبھی کبھار وقت کی کمی کی وجہ سے، میں صحیح اور محفوظ کام کے طریقہ کار سے ہٹ جاتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>5, 'question_e'=> 'It is not always practical to follow all safety rules and procedures while doing a job.', 'question_u'=>'کام کرتے وقت تمام حفاظتی اصولوں اور طریقہ کار پر عمل کرنا ہمیشہ ضروری نہیں ہوتا۔']);
        $this->commonOption($question);

        $question = Question::create(['section_id'=>6, 'question_e'=> 'I always point out to the management of any safety-related matters are noticed in my company.', 'question_u'=>'میں ہمیشہ میری کمپنی میں کسی بھی حفاظت سے متعلق معاملات کے بارے میں بات کرتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>6, 'question_e'=> 'I put extra effort to improve the safety of the workplace.', 'question_u'=>'میں کام کی جگہ کی حفاظت کو بہتر بنانے کے لیے اضافی کوشش کرتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>6, 'question_e'=> 'I voluntarily carry out tasks or activities that help to improve workplace safety.', 'question_u'=>'میں رضاکارانہ طور پر کام یا سرگرمیاں انجام دیتا ہوں جو کام کی جگہ کی حفاظت کو بہتر بنانے میں مدد کرتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>6, 'question_e'=> 'I encourage my co-workers to work safely.', 'question_u'=>'میں اپنے ساتھی کارکنوں کو محفوظ طریقے سے کام کرنے کی ترغیب دیتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>6, 'question_e'=> 'I help my co-workers when they are working under risky or hazardous conditions (endangering themselves)', 'question_u'=>'میں اپنے ساتھی کارکنوں کی مدد کرتا ہوں جب وہ خطرناک یا خطرناک حالات میں کام کر رہے ہوں (خود کو خطرے میں ڈال رہے ہوں)']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>6, 'question_e'=> 'I always prefer not to work alone at highly energized areas or where there is current of around 400volts.', 'question_u'=>'میں ہمیشہ زیادہ وولٹ والے علاقوں یا ان جگہوں پر جہاں تقریباً 400 وولٹ سے زیادہ کرنٹ ہو، اکیلے کام کرنے سے بچتا ہوں۔']);
        $this->commonOption($question);
        $question = Question::create(['section_id'=>6, 'question_e'=> 'I always insist my co-workers to wear safety equipments even if it is uncomfortable', 'question_u'=>'میں ہمیشہ اپنے ساتھی کارکنوں سے حفاظتی سازوسامان پہننے کی تاکید کرتا ہوں ۔']);
        $this->commonOption($question);
    }

    public function commonOption($question)
    {
        $question->options()->saveMany([
            new Option(['option_e'=> 'Strongly Disagree', 'option_u'=>'بہت زیادہ اختلاف', 'is_other'=>0]),
            new Option(['option_e'=> 'Disagree', 'option_u'=>'اختلاف کرنا', 'is_other'=>0]),
            new Option(['option_e'=> 'Neutral', 'option_u'=>'غیر جانبدار', 'is_other'=>0]),
            new Option(['option_e'=> 'Agree', 'option_u'=>'متفق', 'is_other'=>0]),
            new Option(['option_e'=> 'Strongly agree', 'option_u'=>'بہت زیادہ اتفاق', 'is_other'=>0]),
        ]);
    }
}
