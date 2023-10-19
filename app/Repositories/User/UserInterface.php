<?php

namespace App\Repositories\User;

interface UserInterface
{

    public function all(int $paginate = null, bool $status = null);

    public function get($id);
    public function store($request);
    public function profileUpdate($request);

    public function passwordUpdate($request);
    public function delete($id);
    public function permissionUpdate($id, $request);
}
