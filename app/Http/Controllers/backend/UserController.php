<?php

namespace App\Http\Controllers\Backend;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    private $repo, $roleRepo;

    public function __construct(UserInterface $repo, RoleInterface $roleRepo)
    {
        $this->repo     = $repo;
        $this->roleRepo = $roleRepo;
    }


    public function index()
    {
        $users = $this->repo->all(paginate: 10);
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepo->all();
        return view('backend.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $result = $this->repo->store($request);

        if ($result['status']) {
            return redirect()->route('user.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }


    public function edit($id)
    {
        $user         = $this->repo->get($id);
        $roles = $this->roleRepo->all(status: StatusEnum::ACTIVE->value);
        return view('backend.user.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $result = $this->repo->update($request);
        if ($result['status']) {
            return redirect()->route('user.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
    }


    public function delete($id)
    {
        if ($this->repo->delete($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = 'success';
            $success[2] = "Deleted";
            return response()->json($success);
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
            return response()->json($success);
        endif;
    }
}
