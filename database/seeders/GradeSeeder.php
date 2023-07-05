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
        Grade::factory()->create([
            'name' => 'A1',
            'class-meeting' => '12',
        ]);
        Grade::factory()->create([
            'name' => 'A2',
            'class-meeting' => '12',
        ]);
        Grade::factory()->create([
            'name' => 'A3',
            'class-meeting' => '12',
        ]);
    }
}
