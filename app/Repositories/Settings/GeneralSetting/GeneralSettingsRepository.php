<?php

namespace App\Repositories\Settings\GeneralSetting;

use App\Enums\ImageSize;
use App\Models\Backend\Setting;
use App\Traits\ReturnFormatTrait;
use App\Repositories\Upload\UploadInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GeneralSettingsRepository implements GeneralSettingsInterface
{

    use ReturnFormatTrait;

    private $model, $upload;

    public function __construct(Setting $model, UploadInterface $upload)
    {
        $this->model = $model;
        $this->upload = $upload;
    }

    public function update($request)
    {
        // try {
        DB::beginTransaction();

        $logo_with_text = null;
        $logo = null;
        $favicon = null;

        if ($request->hasFile('logo_with_text')) {
            $old_id = globalSettings('logo_with_text') ?? null;
            $logo_with_text = $this->upload->uploadImage($request->file('logo_with_text'), 'settings/', [ImageSize::LOGO_210x44], $old_id);
        }

        if ($request->hasFile('logo')) {
            $old_id = globalSettings('logo') ?? null;
            $logo = $this->upload->uploadImage($request->file('logo'), 'settings/', [ImageSize::IMAGE_80x80, ImageSize::IMAGE_100x100], $old_id);
        }

        if ($request->hasFile('favicon')) {
            $old_id = globalSettings('favicon') ?? null;
            $favicon = $this->upload->uploadImage($request->file('favicon'), 'settings/', [ImageSize::IMAGE_16x16, ImageSize::IMAGE_32x32], $old_id);
        }

        $data = collect($request->validated());

        if ($logo_with_text !== null) {
            $data->put('logo_with_text', $logo_with_text);
        }

        if ($logo !== null) {
            $data->put('logo', $logo);
        }
        if ($favicon !== null) {
            $data->put('favicon', $favicon);
        }

        $data->each(function ($value, $key) {
            if ($value === null) {
                return; // Skip if the value is null
            }
            $this->model::updateOrCreate(['key' => $key], ['value' => $value]);
        });

        DB::commit();

        return $this->responseWithSuccess(__('alert.successfully_updated'), []);
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     return $this->responseWithError(__('alert.something_went_wrong'), []);
        // }
    }
}
