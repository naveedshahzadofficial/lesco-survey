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
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Marital Status', 'question_u'=>'ازدواجی حیثیت']);

        $question = Question::create(['section_id'=>1, 'question_e'=> 'Age (Years)', 'question_u'=>'عمر (سال)']);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Cigarette smoking', 'question_u'=>'سگریٹ پینا']);
        $question = Question::create(['section_id'=>1, 'question_e'=> 'Monthly income', 'question_u'=>'ماہانہ آمدنی']);
    }
}
