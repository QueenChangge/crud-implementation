<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            ['name' => 'A1', 'class-meeting' => '12', 'program_id'=>1],
            ['name' => 'A2', 'class-meeting' => '12', 'program_id'=>2],
            ['name' => 'A3', 'class-meeting' => '12', 'program_id'=>1],
        ];

        foreach ($grades as $grade) {
            Grade::factory()->create($grade);
        }
    }
}
