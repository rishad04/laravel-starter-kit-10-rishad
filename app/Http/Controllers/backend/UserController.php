<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repo;

    public function __construct(UserInterface $repo)
    {
        $this->repo = $repo;
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


    // public function destroy($id)
    // {
    //     //
    // }
}
