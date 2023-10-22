<?php

namespace App\Http\Controllers\Backend;

use App\Enums\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use App\Http\Requests\Role\UpdateRequest;
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
        // $roles = $this->roleRepo->all(status: Status::ACTIVE);
        // return view('backend.user.create', compact('roles'));

        $roles = $this->roleRepo->all();
        return view('backend.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        // dd($request);
        $result = $this->repo->store($request);

        if ($result['status']) {
            return redirect()->route('user.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }




    public function profile($id)
    {
        $user = $this->repo->get($id);
        return view('backend.user.profile', compact('user'));
    }

    public function profileEdit()
    {
        $user = auth()->user();
        return view('backend.user.update_profile', compact('user'));
    }

    public function changePassword($id)
    {
        // $user = $this->repo->get($id);
        return view('backend.profile.change_password', compact('user'));
    }

    public function edit($id)
    {
        $user         = $this->repo->get($id);
<<<<<<< HEAD
        $roles = $this->roleRepo->all();
        return view('backend.user.edit',compact('roles','user'));
=======
        $roles = $this->roleRepo->all(status: Status::ACTIVE);
        return view('backend.user.edit', compact('roles', 'user'));
>>>>>>> 9ea48f174e46dad837d9294ecc92cd4e840cb6a9
    }

    public function update(UpdateUserRequest $request)
    {
        $result = $this->repo->update($request);
        if ($result['status']) {
            return redirect()->route('user.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
    }


    // public function profileUpdate(UpdateRequest $request)
    // {
    //     $result = $this->repo->profileUpdate($request);

    //     if ($result['status']) {
    //         return redirect()->route('profile.index', $id)->with('success', $result['message']);
    //     }
    //     return back()->with('danger', $result['message']);
    // }

    // public function updatePassword(UpdatePasswordRequest $request)
    // {
    //     $result = $this->repo->updatePassword($request);

    //     if ($result['status']) {
    //         return redirect()->route('profile.index', $id)->with('success', $result['message']);
    //     }
    //     return redirect()->back()->withInput()->with('danger', $result['message']);
    // }


    public function destroy($id)
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
