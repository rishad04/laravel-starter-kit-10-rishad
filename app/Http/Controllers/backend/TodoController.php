<?php

namespace App\Http\Controllers\backend;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\User\UserInterface;
use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;

class TodoController extends Controller
{
    protected $repo, $userRepo;

    public function __construct(TodoInterface $repo, UserInterface $userRepo)
    {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
    }



    public function index()
    {
        $all_todo = $this->repo->all();

        return view('backend.todo.index', compact('all_todo'));
    }


    public function create()
    {
        $users      = $this->userRepo->all(status: Status::ACTIVE->value);
        return view('backend.todo.create', compact('users'));
    }

    public function store(StoreTodoRequest $request)
    {
        $result = $this->repo->store($request);

        if ($result['status']) {
            return redirect()->route('todo.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }

    public function edit($id)
    {
        $todo          = $this->repo->get($id);
        $users         = $this->userRepo->all(status: Status::ACTIVE->value);
        return view('backend.todo.edit', compact('todo', 'users'));
    }



    public function update(UpdateTodoRequest $request)
    {
        $result = $this->repo->update($request);
        if ($result['status']) {
            return redirect()->route('todo.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
    }

    public function delete($id)
    {
        $result = $this->repo->delete($id);

        return response()->json($result, $result['status_code']);
    }
}
