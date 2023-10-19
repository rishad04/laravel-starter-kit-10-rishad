<?php

namespace App\Repositories\Role;

use App\Enums\Status;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Role\RoleInterface;

class RoleRepository implements RoleInterface
{


    protected $model, $repo_permission;

    public function __construct(Role $model, Permission $repo_permission)
    {
        $this->model = $model;
        $this->repo_permission = $repo_permission;
    }


    public function permissions()
    {
        return  $this->repo_permission::all();
    }

    public function all(int $paginate = null, bool $status = null)
    {
        $query = $this->model::query();

        if ($status !== null) {
            $query->where('status', $status);
        }

        $query->latest('updated_at');

        if ($paginate !== null) {
            return  $query->paginate($paginate);
        }

        return $query->get();
    }

    public function get()
    {
        return $this->model::orderByDesc('id')->paginate(10);
    }
    public function getRole()
    {
        return $this->model::where('status', Status::ACTIVE)->get();
    }

    //role store
    public function store($request)
    {
        try {
            $role             = new Role();
            $role->name       = $request->name;
            $role->slug       = str_replace(' ', '-', strtolower($request->name));
            $role->permissions = $request->permissions ? $request->permissions : [];
            $role->status     = $request->status == 'on' ? Status::ACTIVE : Status::INACTIVE;
            $role->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function edit($id)
    {
        return $this->model::find($id);
    }

    //role update
    public function update($request)
    {
        try {

            $role             = $this->model::find($request->id);
            $role->name       = $request->name;
            $role->slug       = str_replace(' ', '-', strtolower($request->name));
            $role->permissions = $request->permissions ? $request->permissions : [];
            $role->status     = $request->status == 'on' ? Status::ACTIVE : Status::INACTIVE;
            $role->save();
            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }

    //role delete
    public function delete($id)
    {
        try {
            return $this->model::destroy($id);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
