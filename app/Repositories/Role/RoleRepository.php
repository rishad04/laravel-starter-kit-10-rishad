<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Enums\Status;
use App\Models\Permission;
use App\Traits\ReturnFormatTrait;
use App\Repositories\Role\RoleInterface;

class RoleRepository implements RoleInterface
{

    use ReturnFormatTrait;

    protected $model, $repo_permission;

    public function __construct(Role $model, Permission $repo_permission)
    {
        $this->model = $model;
        $this->repo_permission = $repo_permission;
    }

    public function permissions()
    {
        return Permission::all();
    }

    public function all(int $paginate = null, int $status = null)
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

    public function store($request)
    {
        try {

            $role             = new $this->model();
            $role->name       = $request->name;
            $role->slug       = str_replace(' ', '-', strtolower($request->name));
            $role->permissions = $request->permissions ? $request->permissions : [];
            $role->status     = $request->status;
            $role->save();

            return $this->responseWithSuccess(___('alert.successfully_deleted'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
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

            $role               = $this->model::find($request->id);
            $role->name         = $request->name;
            $role->permissions  = $request->permissions;
            $role->status       = $request->status;
            $role->slug         = str_replace(' ', '-',  strtolower($request->name));
            $role->save();

            return $this->responseWithSuccess(___('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    //role delete
    public function delete($id)
    {
        $item = $this->model::find($id);
        $item->delete();
    }
}
