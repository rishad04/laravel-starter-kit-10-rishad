<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;

class UserController extends Controller
{
    protected $repo, $role;

    public function __construct(UserInterface $repo, RoleInterface $role)
    {
        $this->repo = $repo;
        $this->role = $role;
    }

    public function index(Request $request)
    {
        $users = $this->repo->all();
        return view('backend.user.index', compact('users', 'request'));
    }
    public function filter(Request $request)
    {
        $users = $this->repo->filter($request);
        return view('backend.user.index', compact('users', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
