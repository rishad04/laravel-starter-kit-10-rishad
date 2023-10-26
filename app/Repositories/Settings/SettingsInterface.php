<?php

namespace App\Repositories\Settings;

interface SettingsInterface
{
    public function update($request);

    public function UpdateGeneralSettings($request);
    public function updateMailSettings($request);
}
