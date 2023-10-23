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
    // {
    //     $userIds = User::pluck('id');

    //     for ($i = 0; $i < 5; $i++) {
    //         To_do::create([
    //              'title' => 'Test Task ' . ($i + 1),
    //              'description' => 'Description for Test Task ' . ($i + 1),
    //              'user_id' => $userIds->random(),
    //              'date' => Carbon::now()->addDays($i),
    //              'status' => rand(1, 3),
    //             'note' => 'Note for Test Task ' . ($i + 1),
    //         ]);
    //     }
    // }


    {
        $todo                = new Todo();
        $todo->title         = 'Todo List 1';
        $todo->date          = '22/07/2022';
        $todo->user_id       = 1;
        $todo->description   = 'Todo list 1';
        $todo->date          = '1/8/2022';
        $todo->note          = 'Lorem ipsum note';
        $todo->status        = TodoStatus::PENDING;
        $todo->save();

        $todo                = new Todo();
        $todo->title         = 'Todo List 2';
        $todo->date          = '22/07/2022';
        $todo->user_id       = 1;
        $todo->description   = 'Todo list 2';
        $todo->date          = '1/8/2022';
        $todo->note          = 'Lorem ipsum note';
        $todo->status        = TodoStatus::PROCESSING;
        $todo->save();

        $todo                = new Todo();
        $todo->title         = 'Todo List 3';
        $todo->date          = '22/07/2022';
        $todo->user_id       = 2;
        $todo->description   = 'Todo list 3';
        $todo->date          = '1/8/2022';
        $todo->note          = 'Lorem ipsum note';
        $todo->status        = TodoStatus::PROCESSING;
        $todo->save();


        $todo                = new Todo();
        $todo->title         = 'Todo List 4';
        $todo->date          = '22/07/2022';
        $todo->user_id       = 1;
        $todo->description   = 'Todo list 4';
        $todo->date          = '1/8/2022';
        $todo->note          = 'Lorem ipsum note';
        $todo->status        = TodoStatus::COMPLETED;
        $todo->save();

        $todo                = new Todo();
        $todo->title         = 'Todo List 5';
        $todo->date          = '22/07/2022';
        $todo->user_id       = 2;
        $todo->description   = 'Todo list 5';
        $todo->date          = '1/8/2022';
        $todo->note          = 'Lorem ipsum note';
        $todo->status        = TodoStatus::COMPLETED;
        $todo->save();

        $todo                = new Todo();
        $todo->title         = 'Todo List 6';
        $todo->date          = '22/07/2022';
        $todo->user_id       = 1;
        $todo->description   = 'Todo list 6';
        $todo->date          = '1/8/2022';
        $todo->note          = 'Lorem ipsum note';
        $todo->status        = TodoStatus::COMPLETED;
        $todo->save();
    }
}
