<?php

namespace App\Repositories\Settings;

use App\Enums\ImageSize;
use App\Models\Backend\Setting;
use App\Repositories\Upload\UploadInterface;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\DB;

class SettingsRepository implements SettingsInterface
{
    use ReturnFormatTrait;

    private $model, $upload;

    public function __construct(Setting $model, UploadInterface $upload)
    {
        $this->model = $model;
        $this->upload = $upload;
    }


    // UpdateGeneralSettings
    public function UpdateSettings($request)
    {
        // try {
            DB::beginTransaction();


            $ignore    = [];
            $ignore [] = '_token';
            $ignore [] = '_method';

            foreach ($request->except($ignore) as $key => $value) {
                $settings        = Setting::where('key',$key)->first();

                if($settings){
                    if($key == 'logo'){
                        $logo              = Setting::where('key',$key)->first();
                        $settings->value  = $this->upload->uploadImage($request->logo, 'settings', [], $logo->logo);
                    }elseif($key == 'favicon'){
                        $favicon           = Setting::where('key',$key)->first();
                        $settings->value  = $this->upload->uploadImage($request->favicon, 'settings', [], $favicon->favicon);
                    }else{
                        $settings->value   = $value;
                    }
                    $settings->save();
                }else{
                    $settings          = new Setting();
                    $settings->key   = $key;
                    if($key == 'logo'){
                        $settings->value  = $this->upload->uploadImage($request->logo, 'settings', []);
                    }elseif($key == 'favicon'){
                        $settings->value  = $this->upload->uploadImage($request->favicon, 'settings', []);
                    }else{
                        $settings->value   = $value;
                    }

                    $settings->save();
                }
            }

            DB::commit();

            return $this->responseWithSuccess(___('alert.successfully_updated'), []);
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     return $this->responseWithError(___('alert.something_went_wrong'), []);
        // }
    }

}
