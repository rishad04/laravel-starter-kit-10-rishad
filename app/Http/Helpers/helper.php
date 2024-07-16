<?php

use App\Models\Upload;
use App\Models\Backend\Setting;
use App\Models\Backend\Language;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;



// Global Settings
if (!function_exists('settings')) {
    function settings($key = "")
    {
        $settings = Cache::rememberForever("settings", fn () => Setting::pluck('value', 'key')->toArray());

        return data_get($settings, $key);
    }
}

if (!function_exists('getImage')) {
    function getImage($upload, string $version = null, string $default_image = 'default-image.png')
    {
        if ($upload && $upload->{$version} && File::exists(public_path($upload->{$version}))) {

            return asset($upload->{$version});
        }

        if ($default_image && File::exists(public_path("images/default/$default_image"))) {
            return asset("images/default/$default_image");
        }

        return "https://placehold.co/200x200?text=No+Image";
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
        $id = $upload_id ?? settings('favicon');

        $cacheKey = "favicon";

        $favicon = Cache::get($cacheKey);

        if ($favicon == null || !File::exists(public_path($favicon->original))) {
            Cache::forget($cacheKey);
            $favicon = Cache::rememberForever($cacheKey, fn () => Upload::find($id));
        }

        return getImage($favicon, 'original');
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

// date format 
if (!function_exists('dateFormat')) {
    function dateFormat($newDate = null)
    {
        return date(settings('date_format'), strtotime($newDate));
    }
}

if (!function_exists('timeFormat')) {
    function timeFormat($newDate = null)
    {
        return date(settings('time_format'), strtotime($newDate));
    }
}

if (!function_exists('dateTimeFormat')) {
    function dateTimeFormat($datetime = null)
    {
        return date(settings('date_format') . ' ' . settings('time_format'), strtotime($datetime));
    }
}
//end date format

function ___($key = null, $replace = [], $locale = null)
{
    try {

        $input       = explode('.', $key);
        $file        = $input[0];
        $term        = $input[1];

        $app_local   = session('locale', settings('language'));

        if ($app_local == "") {
            $app_local = 'en';
        }

        $jsonString  = file_get_contents(base_path('lang/' . $app_local . '/' . $file . '.json'));

        $data        = json_decode($jsonString, true);

        // if (config('app.env') == 'local') {
        //     $data[$term] =  ucwords(str_replace(['_', '-'], ' ', $term));
        //     $updatedJsonString = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        //     file_put_contents(base_path('lang/' . $app_local . '/' . $file . '.json'), $updatedJsonString);
        // }

        return $data[$term] ?? $term;
    } catch (\Exception $e) {
        return $key;
    }
}


if (!function_exists('defaultLanguage')) {
    function defaultLanguage()
    {
        $app_local  = Session::get('locale') ?? settings('language');

        if ($app_local == '') {
            $app_local = 'en';
        }

        $cacheKey = "defaultLanguage-{$app_local}";

        if (Cache::has($cacheKey)) {

            $language = Cache::get($cacheKey);

            Cache::put($cacheKey, $language,  Carbon\Carbon::now()->addMinutes(5));  // Extend the cache expiration time by 5 minutes

            return  $language;
        }

        return Cache::remember($cacheKey, Carbon\Carbon::now()->addMinutes(10), fn () => Language::where('code', $app_local)->first());
    }
}
