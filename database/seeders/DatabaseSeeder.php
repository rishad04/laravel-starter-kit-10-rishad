<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UploadSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\DesignationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UploadSeeder::class,
            RoleSeeder::class,
            DesignationSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
        ]);


        $this->call(SettingSeeder::class);
    }
}
