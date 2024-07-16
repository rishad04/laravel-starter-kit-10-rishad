<?php

namespace App\Repositories\Todo;

use App\Enums\TodoStatus;
use App\Models\Backend\Todo;
use App\Traits\ReturnFormatTrait;
use App\Repositories\Todo\TodoInterface;
use App\Repositories\Upload\UploadInterface;

class TodoRepository implements TodoInterface
{

    use ReturnFormatTrait;

    protected $model, $upload;

    public function __construct(Todo $model, UploadInterface $upload)
    {
        $this->model  = $model;
        $this->upload = $upload;
    }

    public function all()
    {
        return $this->model::orderByDesc('id')->paginate(10);
    }

    public function get($id)
    {
        return $this->model::find($id);
    }

    public function store($request)
    {
        try {
            $todo               = new $this->model;
            $todo->title        = $request->title;
            $todo->user_id      = $request->user;
            $todo->date         = $request->date;
            $todo->description  = $request->description;
            $todo->status       = $request->status;
            $todo->todo_file    = $this->upload->uploadImage($request->todoFile, 'todo');
            $todo->save();

            return $this->responseWithSuccess(___('alert.successfully_added'));
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'));
        }
    }

    public function update($request)
    {
        try {

            $todo               = $this->model::findOrFail($request->id);
            $todo->title        = $request->title;
            $todo->user_id      = $request->user;
            $todo->date         = $request->date;
            $todo->description  = $request->description;
            $todo->status       = $request->status;
            $todo->todo_file    = $this->upload->uploadImage($request->todoFile, 'todo', [], $todo->todo_file);
            $todo->save();

            return $this->responseWithSuccess(___('alert.successfully_added'));
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'));
        }
    }


    public function delete($id)
    {
        try {
            $todo  = $this->model::find($id);
            $this->upload->deleteImage($todo->todo_file, 'delete');
            $todo->delete();

            return $this->responseWithSuccess(___('alert.successfully_deleted'));
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'));
        }
    }

    public function statusUpdate($id)
    {
        try {
            $todo                = $this->model::find($id);
            if ($todo->status     == TodoStatus::PENDING) :
                $todo->status    = TodoStatus::PROCESSING;
            elseif ($todo->status == TodoStatus::PROCESSING) :
                $todo->status    = TodoStatus::COMPLETED;
            endif;
            $todo->save();

            return $this->responseWithSuccess(___('alert.successfully_added'));
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.something_went_wrong'));
        }
    }
}
