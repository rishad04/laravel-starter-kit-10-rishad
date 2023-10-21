<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use App\Http\Requests\role\StoreRoleRequest;
use App\Http\Requests\role\UpdateRoleRequest;

class RoleController extends Controller
{

    protected $repo;

    public function __construct(RoleInterface $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(RoleInterface $model)
    {
        $roles = $this->repo->all();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions    = $this->repo->permissions();
        return view('backend.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $result = $this->repo->store($request);
        if ($result['status']) {
            return redirect()->route('role.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
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
        $role = $this->repo->get($id);
        $permissions = $this->repo->permissions($role->slug);
      
        return view('backend.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $result = $this->repo->store($request);
        if ($result['status']) {
            return redirect()->route('role.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
