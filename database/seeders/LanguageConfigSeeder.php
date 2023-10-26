<?php

namespace Database\Seeders;

use App\Models\Backend\LanguageConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langConfig              = new LanguageConfig();
        $langConfig->language_id = 1;
        $langConfig->name        = 'English';
        // $langConfig->script      = 'Latn';
        $langConfig->native      = 'English';
        $langConfig->regional    = 'en_GB';
        $langConfig->save();


        $langConfig              = new LanguageConfig();
        $langConfig->language_id = 2;
        $langConfig->name        = 'Bangla';
        // $langConfig->script      = 'Latn';
        $langConfig->native      = 'Bengali';
        $langConfig->regional    = 'bn_BN';
        $langConfig->save();


        $langConfig              = new LanguageConfig();
        $langConfig->language_id = 3;
        $langConfig->name        = 'Arabic';
        // $langConfig->script      = 'Latn';
        $langConfig->native      = 'Arabian';
        $langConfig->regional    = 'ar_AR';
        $langConfig->save();
    }
}
