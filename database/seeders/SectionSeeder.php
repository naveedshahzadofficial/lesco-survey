<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create(['section_e'=>'Demographic Profile', 'section_u' => 'ڈیموگرافک پروفائل']);
        Section::create(['section_e'=>'Top Administrative Responsibilities:', 'section_u' => 'تنظیم میں اعلٰی اننظامیہ کی ذمہ دارباں:']);
        Section::create(['section_e'=>'Supervisor Responsibilities:', 'section_u' => 'سپروائزر کی ذمہ داریاں:']);
        Section::create(['section_e'=>'Safety information:', 'section_u' => 'حفاظت کاعلم:']);
        Section::create(['section_e'=>'Safety Compliance:', 'section_u' => 'حفاظتی تعمیل:']);
        Section::create(['section_e'=>'Participating in safety procedures:', 'section_u' => 'حفاظتی عمل میں شرکت:']);
    }
}
