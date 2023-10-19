<?php
<<<<<<< HEAD

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
=======
namespace App\Repositories\User;

interface UserInterface {

    public function all();
    // public function hubs();
    // public function departments();
    public function designations();
    public function get($id);
    public function filter($request);
    public function store($request);
    public function update($request);
    public function delete($id);
    public function file($image_id, $data);
    public function permissionUpdate($id,$request);

>>>>>>> 717dc7f581371d2949afbdcc8ed1cfdb6f8b9277
}
