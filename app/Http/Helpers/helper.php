<?php

use App\Models\Backend\Setting;
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

// Global Settings
if (!function_exists('globalSettings')) {
    function globalSettings($key = "")
    {
        return Setting::where('key', $key)->first('value')->value ?? null;
    }
}

if (!function_exists('getImage')) {
    function getImage($upload_id = null, $version = 'original')
    {
        $upload = Upload::find($upload_id);

        if (!$upload) {
            return "https://placehold.co/200x200?text=No+Image";
        }

        if ($upload->{$version} != null && File::exists(public_path($upload->{$version}))) {
            return asset($upload->{$version});
        }

        if (File::exists(public_path($upload->original))) {
            return asset($upload->original);
        }

        return asset('backend/assets/img/logo/favicon.png');
    }
}


//logo
if (!function_exists('logo')) {
    function logo($upload_id = null)
    {
        $logo   = Upload::find($upload_id);
        if ($logo && File::exists(public_path($logo->original))) :
            return asset($logo->original);
        endif;
        return asset('backend/assets/img/logo/favicon.png');
    }
}

// favicon
if (!function_exists('favicon')) {
    function favicon($upload_id = null)
    {
        $favicon   = Upload::find($upload_id);
        if ($favicon && File::exists(public_path($favicon->original))) :
            return asset($favicon->original);
        endif;
        return asset('backend/assets/img/logo/favicon.png');
    }
}

//hasPermission
if (!function_exists('hasPermission')) {
    function hasPermission($permission = null)
    {
        if (in_array($permission, auth()->user()->permissions)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($newDate = null)
    {
        $day = date('dS', strtotime($newDate));
        $month = strtolower(date('F', strtotime($newDate)));
        $yearly = date('Y', strtotime($newDate));

        return  $day . ' ' . $month . ' ' . $yearly;
    }
}

// function ___($key = null, $replace = [], $locale = null)
// {
//     $input       = explode('.', $key);
//     $file        = $input[0];
//     $term         = $input[1];
//     $app_local   = app()->getLocale();

//     $jsonString  = file_get_contents(base_path('lang/' . $app_local . '/' . $file . '.json'));
//     $data        = json_decode($jsonString, true);
//     if (@$data[$term]) {
//         return $data[$term];
//     }

//     return $term;
// }
