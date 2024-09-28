<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaculitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Facility::insert([
            ['name' => 'الطب', 'availableno' => 0, 'programrequirement_id' => 1, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'طب الأسنان', 'availableno' => 0, 'programrequirement_id' => 1, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'الصيدلة', 'availableno' => 0, 'programrequirement_id' => 1, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'الهندسة', 'availableno' => 0, 'programrequirement_id' => 2, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'علوم وهندسة الحاسب', 'availableno' => 0, 'programrequirement_id' => 4, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'العلوم الأساسية', 'availableno' => 0, 'programrequirement_id' => 4, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'المعاملات القانونية الدولية', 'availableno' => 0, 'programrequirement_id' => 5, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'التمريض', 'availableno' => 0, 'programrequirement_id' => 1, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'الأعمال', 'availableno' => 0, 'programrequirement_id' => 5, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'تكنولوجيا العلوم الصحية التطبيقية', 'availableno' => 0, 'programrequirement_id' => 4, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
            ['name' => 'علوم وهندسة المنسوجات', 'availableno' => 0, 'programrequirement_id' => 4, 'minratio' => 0, 'maxavailableno' => 0, 'faculityminratio' => 0],
        ]);
    }
}
