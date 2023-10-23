<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Role\RoleInterface;
use App\Http\Requests\role\StoreRoleRequest;
use App\Http\Requests\role\UpdateRoleRequest;
use App\Repositories\Permission\PermissionInterface;

class RoleController extends Controller
{

    private $repo;
    private $permission;

    function __construct(RoleInterface $repo, PermissionInterface $permission)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->repo       = $repo;
        $this->permission = $permission;
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


        // $permissions = $this->repo->permissions(null);
        // return view('backend.role.create', compact('permissions'));


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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $permissions     = $this->repo->permissions();
        $role            = $this->repo->edit($id);
        return view('backend.role.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request)
    {
        $result = $this->repo->update($request);
        if ($result['status']) {
            return redirect()->route('role.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
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
