<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\User\UserInterface;

class TodoController extends Controller
{
    protected $repo,$userRepo;

    public function __construct(TodoInterface $repo,UserInterface $userRepo)
    {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
    }

    

    public function index () {

        $todos = $this->repo->all();

        return view('backend.todo.index',compact('todos'));
        
    }

    
    public function create () {


        return view('backend.todo.create');

    }

    public function store () {

    }



    public function todoModal () {

    }
}
