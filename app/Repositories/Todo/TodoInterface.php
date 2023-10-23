<?php
namespace App\Repositories\Todo;

Interface TodoInterface {

    public function all();
    public function get($id);
    public function store($request);
    public function update($request,$id);
    public function delete($id);
    public function statusUpdate($id);

}
