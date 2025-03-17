<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ['name' => 'Basic', 'description' => 'qwertyuioasdfghjkzxcvbnm', 'price' => 20000, 'meeting' => 'wertyu', 'icon' => 'qwertyui'],
            ['name' => 'Advance', 'description' => 'qwertyuioasdfghjkzxcvbnm', 'price' => 20000, 'meeting' => 'wertyu', 'icon' => 'qwertyui'],
            ['name' => 'High', 'description' => 'qwertyuioasdfghjkzxcvbnm', 'price' => 20000, 'meeting' => 'wertyu', 'icon' => 'qwertyui'],
        ];

        foreach ($programs as $program) {
            Program::factory()->create($program);
        }
    }

}
