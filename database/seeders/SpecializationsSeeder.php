<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;

use Illuminate\Support\Facades\DB;
class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],

            ['en'=> 'Mathematics', 'ar'=> 'الرياضيات'],
            ['en'=> 'Social Studies', 'ar'=> 'الدراسات الاجتماعية'],
            ['en'=> 'Geography', 'ar'=> 'الجغرافيا'],

            ['en'=> 'Physics', 'ar'=> 'الفيزياء'],
            ['en'=> 'Chemistry', 'ar'=> 'الكيمياء'],
            ['en'=> 'Biology', 'ar'=> 'الاحياء'],

            ['en'=> 'Geology', 'ar'=> 'الجيولوجيا'],
            ['en'=> 'Philosophy', 'ar'=> 'فلسفة'],
            ['en'=> 'Islamic Education', 'ar'=> 'تربية دينية'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }
    }
}
