<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Backend\To_do;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class To_DoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userIds = User::pluck('id');

        for ($i = 0; $i < 5; $i++) {
            To_do::create([
                'title' => 'Test Task ' . ($i + 1),
                'description' => 'Description for Test Task ' . ($i + 1),
                'user_id' => $userIds->random(),
                'date' => Carbon::now()->addDays($i),
                'status' => rand(1, 3),
                'note' => 'Note for Test Task ' . ($i + 1),
            ]);
        }
    }
}
