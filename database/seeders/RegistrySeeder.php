<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registry;
use App\Models\Student;
use App\Models\Course;

class RegistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registry::truncate();

        $student = Student::first();
        $course = Course::first();

        Registry::create([
            'student_id' => $student->id,
            'course_id' => $course->id,
            'unique' => null,
        ]);
    }
}
