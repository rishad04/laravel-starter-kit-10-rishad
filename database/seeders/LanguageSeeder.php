<?php

namespace Database\Seeders;

use App\Models\Backend\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lang                 = new Language();
        $lang->name           = 'English';
        $lang->code           = 'en';
        $lang->icon_class     = 'flag-icon flag-icon-us';
        $lang->text_direction = 'LTR';
        $lang->save();


        $lang                 = new Language();
        $lang->name           = 'Bangla';
        $lang->code           = 'bn';
        $lang->icon_class     = 'flag-icon flag-icon-bd';
        $lang->text_direction = 'LTR';
        $lang->save();


        $lang                 = new Language();
        $lang->name           = 'Arabic';
        $lang->code           = 'ar';
        $lang->icon_class     = 'flag-icon flag-icon-ae';
        $lang->text_direction = 'RTL';
        $lang->save();
    }
}
