<?php

namespace App\Repositories\Language;

use App\Enums\Status;
use App\Models\Backend\FlagIcon;
use App\Models\Backend\Language;
use App\Models\Backend\LanguageConfig;
use App\Repositories\Language\LanguageInterface;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LanguageRepository implements LanguageInterface
{
    use ReturnFormatTrait;

    protected $model;

    public function __construct(Language $model)
    {
        $this->model = $model;
    }


    public function flags()
    {
        return FlagIcon::all();
    }

    public function activelang()
    {
        return $this->model::where('status', Status::ACTIVE)->get();
    }

    public function get()
    {
        return $this->model::orderByDesc('id')->paginate(10);
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $language                   = new Language();
            $language->name             = $request->name;
            $language->code             = $request->code;
            $language->icon_class       = $request->icon_class;
            $language->text_direction   = $request->text_direction;
            $language->status           = $request->status;
            $language->save();

            $langConfig                 = new LanguageConfig();
            $langConfig->language_id    = $language->id;
            $langConfig->name           = $request->name;
            $langConfig->script         = $request->script;
            $langConfig->native         = $request->native;
            $langConfig->regional       = $request->regional;
            $langConfig->save();

            $path     = base_path('/lang/' . $request->code);

            if (!File::exists($path)) :
                File::makeDirectory($path, 0777, true, true);
                File::copyDirectory(base_path('/lang/en'), base_path('/lang/' . $request->code));

                //write existing data from phrase content
                $newJsonString     = file_get_contents(base_path('/lang/phrase.json'));
                File::put(base_path('/lang/' . $request->code . '.json'), stripslashes($newJsonString));
            endif;

            DB::commit();

            return $this->responseWithSuccess(___('alert.successfully_added'), []);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    public function edit($id)
    {
        return $this->model::find($id);
    }

    public function update($request)
    {
        try {
            DB::beginTransaction();

            $language                    = $this->model::find($request->id);
            if ($language->code  != $request->code) : //if not match old code and new code
                $oldFilePath             =  base_path('/lang/' . $language->code . '.json');
                $newFilePath             =  base_path('/lang/' . $request->code . '.json');
                $oldFolderPath           =  base_path('/lang/' . $language->code);
                $newFolderPath           =  base_path('/lang/' . $request->code);

                //rename file name
                if (!empty($oldFilePath)) :
                    File::move($oldFilePath, $newFilePath);
                endif;
                //rename or make directory name
                if (File::exists($oldFolderPath)) :
                    File::move($oldFolderPath, $newFolderPath);
                else :
                    File::makeDirectory($newFolderPath, 0777, true, true);
                    File::copyDirectory(base_path('/lang/en'), $newFolderPath);
                endif;
            endif;

            $language->name             = $request->name;
            $language->code             = $request->code;
            $language->icon_class       = $request->icon_class;
            $language->text_direction   = $request->text_direction;
            $language->status           = $request->status;
            $language->save();

            $langConfig                 = LanguageConfig::where('language_id', $request->id)->first();
            $langConfig->language_id    = $language->id;
            $langConfig->name           = $request->name;
            $langConfig->script         = $request->script;
            $langConfig->native         = $request->native;
            $langConfig->regional       = $request->regional;
            $langConfig->save();

            DB::commit();
            return $this->responseWithSuccess(___('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    //edit phrase data
    public function editPhrase($id)
    {
        try {
            $lang           = $this->model::find($id);
            $langConfig     = LanguageConfig::where('language_id', $id)->first();

            $path           = base_path('/lang/' . $lang->code);
            if (!File::isDirectory($path)) : //copied directory if does not exist directory
                File::makeDirectory($path, 0777, true, true);
                File::copyDirectory(base_path('/lang/en'), base_path('/lang/' . $lang->code));
            endif;

            //read file
            if (File::exists(base_path('/lang/' . $lang->code . '.json'))) :
                $getJsonData   = file_get_contents(base_path('/lang/' . $lang->code . '.json'));
            else :
                $newJsonData   = file_get_contents(base_path('/lang/phrase.json'));
                File::put(base_path('/lang/' . $lang->code . '.json'), stripslashes($newJsonData));
                $getJsonData   = file_get_contents(base_path('/lang/' . $lang->code . '.json'));
            endif;

            $langData          = json_decode($getJsonData, true);
            return $this->responseWithSuccess(data: $langData);
        } catch (\Throwable $th) {

            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }


    //update phrase data
    public function updatePhrase($request, $code)
    {
        try {
            $req_data   = $request->all();
            $req_data   = [];
            foreach ($request->all() as $key => $value) {
                $req_data[$key] = $value == null ? "" : $value;
            }
            $data       = array_change_key_case(array_slice($req_data, 1));
            //write data in file
            $newJsonData = json_encode($data);
            File::put(base_path('/lang/' . $code . '.json'), $newJsonData);

            return $this->responseWithSuccess(___('alert.successfully_updated'), []);
        } catch (\Throwable $th) {

            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }

    //language delete
    public function delete($id)
    {
        try {
            $lang         = $this->model::find($id);
            $path         = base_path('/lang/' . $lang->code);
            if (File::exists($path)) :
                File::deleteDirectory($path);
            endif;
            $jsonPath     = base_path('/lang/' . $lang->code . '.json');
            if (File::exists($jsonPath)) :
                unlink($jsonPath);
            endif;
            return $lang->delete();

            return $this->responseWithSuccess(___('alert.successfully_deleted'), []);
        } catch (\Throwable $th) {

            return $this->responseWithError(___('alert.something_went_wrong'), []);
        }
    }
}
