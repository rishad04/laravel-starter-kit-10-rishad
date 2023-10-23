<?php

namespace App\Repositories\Settings;

use App\Models\Backend\Setting;
use App\Traits\ReturnFormatTrait;

class SettingsRepository implements SettingsInterface
{
    use ReturnFormatTrait;

    private $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function update($request)
    {
        try {
            $data = collect($request);
            $data->each(fn ($value, $key) => $this->model::updateOrCreate(['key' => $key], ['value' => $value]));
            return $this->responseWithSuccess(__('alert.successfully_updated'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(__('alert.something_went_wrong'), []);
        }
    }
}
