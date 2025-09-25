<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(storage_path('app/public/students.json'));
        $students = collect(json_decode($json, true));

        $students->each(function ($student) {
            student::create([
                'name' => $students->name,
                'email' => $student['email'],
                'age' => $student['age'],
                'city' => $student['city'],
            ]);
        });
    }
}
