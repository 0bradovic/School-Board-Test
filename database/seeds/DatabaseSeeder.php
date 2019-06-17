<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Mark;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $student1 = Student::create([
            'name' => 'Nikola Obradovic'
        ]);

        $student2 = Student::create([
            'name' => 'Jone Doe'
        ]);

        $mark1student1 = Mark::create([
            'student_id' => $student1->id,
            'mark' => 10,
            'board' => "CSM"
        ]);

        $mark2student1 = Mark::create([
            'student_id' => $student1->id,
            'mark' => 9,
            'board' => "CSM"
        ]);

        $mark1student2 = Mark::create([
            'student_id' => $student2->id,
            'mark' => 10,
            'board' => "CSMB"
        ]);

        $mark2student2 = Mark::create([
            'student_id' => $student2->id,
            'mark' => 6,
            'board' => "CSMB"
        ]);

        $mark3student2 = Mark::create([
            'student_id' => $student2->id,
            'mark' => 8,
            'board' => "CSMB"
        ]);



    }
}
