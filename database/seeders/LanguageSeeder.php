<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'uz', 'is_active' => true],
            ['name' => 'ru', 'is_active' => true],
            ['name' => 'en', 'is_active' => false],
            ['name' => 'tr', 'is_active' => false],
            ['name' => 'ar', 'is_active' => false],
            ['name' => 'zh', 'is_active' => false],
        ];

        foreach ($languages as $lang) {
            Language::firstOrCreate(['name' => $lang['name']], $lang);
        }
    }
}
