<?php

namespace App\Repositories\Permission;

interface PermissionInterface
{
    public function all();

    public function get($id);

    public function save($role, $data);

    public function store(array $data);

    public function update($id, array $data);

    public function delete($id);
}
