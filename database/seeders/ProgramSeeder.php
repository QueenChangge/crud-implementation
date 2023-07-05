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
        Program::factory()->create([
            'name' => 'Basic',
            'description' => 'qwertyuioasdfghjkzxcvbnm',
            'price' => 20000,
            'meeting' => 'wertyu',
            'icon' => 'qwertyui'
        ]);
        Program::factory()->create([
            'name' => 'Advance',
            'description' => 'qwertyuioasdfghjkzxcvbnm',
            'price' => 20000,
            'meeting' => 'wertyu',
            'icon' => 'qwertyui'
        ]);
        Program::factory()->create([
            'name' => 'High',
            'description' => 'qwertyuioasdfghjkzxcvbnm',
            'price' => 20000,
            'meeting' => 'wertyu',
            'icon' => 'qwertyui'
        ]);
    }

}
