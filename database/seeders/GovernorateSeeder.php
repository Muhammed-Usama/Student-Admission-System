<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Governorate::insert([
            ['name' => 'أسوان'],
            ['name' => 'أسيوط'],
            ['name' => 'الأقصر'],
            ['name' => 'الإسكندرية'],
            ['name' => 'البحر الأحمر'],
            ['name' => 'البحيرة'],
            ['name' => 'الجيزة'],
            ['name' => 'الدقهلية'],
            ['name' => 'الشرقية'],
            ['name' => 'الغربية'],
            ['name' => 'الفيوم'],
            ['name' => 'القاهرة'],
            ['name' => 'القليوبية'],
            ['name' => 'المنوفية'],
            ['name' => 'المنيا'],
            ['name' => 'الوادي الجديد'],
            ['name' => 'بني سويف'],
            ['name' => 'بورسعيد'],
            ['name' => 'جنوب سيناء'],
            ['name' => 'دمياط'],
            ['name' => 'سوهاج'],
            ['name' => 'شمال سيناء'],
            ['name' => 'قنا'],
            ['name' => 'كفر الشيخ'],
            ['name' => 'محافظة حلايب وشلاتين'],
            ['name' => 'مطروح'],
        ]);
    }
}
