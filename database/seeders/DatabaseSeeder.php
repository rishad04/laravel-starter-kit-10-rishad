<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UploadSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RouteListSeeder::class,
            CurrencySeeder::class,
            LanguageSeeder::class,
            FlagIconSeeder::class,

            SettingSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        $this->call(TodoSeeder::class);
        $this->call(FrequentlyAskedQuestionSeeder::class);
    }
}
