<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Faker\Factory as Faker;

class ManagementSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Create Subjects
        $subjects = ['Mathematics', 'Science', 'English', 'History', 'Physics', 'Biology', 'Indonesian'];
        $subjectModels = [];
        foreach ($subjects as $name) {
            $subjectModels[] = Subject::create(['name' => $name]);
        }

        // 2. Create Classes
        $classes = ['X-A', 'X-B', 'XI-IPA-1', 'XI-IPS-1', 'XII-A'];
        $assessmentTypes = ['Assignment', 'Quiz', 'Exam'];

        foreach ($classes as $className) {
            $class = ClassRoom::create(['name' => $className]);

            // 3. Create Students for each class
            for ($i = 0; $i < 10; $i++) {
                $student = Student::create([
                    'class_room_id' => $class->id,
                    'name' => $faker->name,
                    'nis' => $faker->unique()->numerify('2024####'),
                ]);

                // 4. Create Grades for each student in each subject
                foreach ($subjectModels as $subject) {
                    foreach ($assessmentTypes as $type) {
                        Grade::create([
                            'student_id' => $student->id,
                            'subject_id' => $subject->id,
                            'score' => $faker->randomFloat(2, 60, 100),
                            'type' => $type,
                        ]);
                    }
                }
            }
        }
    }
}
