<?php

namespace App\Repositories\Todo;

use App\Models\Upload;
use App\Enums\TodoStatus;
use App\Models\Backend\Todo;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\File;
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
            if ($request->todoFile) :
                $todo->todo_file = $this->upload->upload('todo', '', $request->todoFile);
            endif;
            $todo->save();

            return $this->responseWithSuccess(__('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
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
            if ($request->todoFile) :
                $todo->todo_file = $this->upload->upload('todo', $todo->todo_file, $request->todoFile);
            endif;
            $todo->save();

            return $this->responseWithSuccess(__('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }


    public function delete($id)
    {


        // $todo               = $this->model::find($id);
        // if($todo && $todo->upload && File::exists(public_path($todo->upload->original))):
        //     unlink(public_path($todo->upload->original));
        //     Upload::destroy($todo->upload->id);
        // endif;
        // return $this->model::destroy($id);


        // try {
        $item  = $this->model::find($id);

        if ($todo && $todo->upload && File::exists(public_path($todo->upload->original))) :
            unlink(public_path($todo->upload->original));
            Upload::deleteImage($item->upload, 'delete');
        endif;

        $item->delete();

        return $this->responseWithSuccess(__('alert.successfully_deleted'), []);
        // } catch (\Throwable $th) {
        //     return $this->responseWithError(__('alert.something_went_wrong'), []);
        // }

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

            return $this->responseWithSuccess(__('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }
}
