<?php

namespace Database\Seeders;

use App\Models\ProgramRequirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ProgramRequirement::insert(
            [
                ['name' => 'علمى علوم'],
                ['name' => 'علمى رياضة'],
                ['name' => 'أدبى'],
                ['name' => 'علمى علوم ورياضة'],
                ['name' => 'الجميع'],
            ]
        );
    }
}
