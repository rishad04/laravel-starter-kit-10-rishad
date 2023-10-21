<?php

namespace App\Repositories\Role;

interface RoleInterface
{

    public function all(int $paginate = null, bool $status = null);

    public function get();
    public function getRole();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($id);
    public function permissions($role);
}
