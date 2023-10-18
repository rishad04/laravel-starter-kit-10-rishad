<?php

use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;





if (!function_exists('static_asset')) {
    function static_asset($path = '')
    {
        if (strpos(php_sapi_name(), 'cli') !== false || defined('LARAVEL_START_FROM_PUBLIC')) {
            return  app('url')->asset($path);
        } else {
            return  app('url')->asset('public/' . $path);
        }
    }
}

if (!function_exists('favicon')) {
    function favicon($upload_id = null)
    {
        $favicon   = Upload::find($upload_id);
        if ($favicon && File::exists(public_path($favicon->original))) :
            return asset($favicon->original);
        endif;
        return asset('Backend/images/favicon.png');
    }
}

//permission
if (!function_exists('hasPermission')) {
    function hasPermission($permission = null)
    {

        if (in_array($permission, Auth::user()->permissions)) {
            return true;
        }
        return false;
    }
}