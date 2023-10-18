<?php
namespace App\Repositories\LoginActivity;

use App\Models\Backend\LoginActivity;
use App\Repositories\LoginActivity\LoginActivityInterface;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
class LoginActivityRepository implements LoginActivityInterface{

    public function getLatest(){
        return LoginActivity::latest()->paginate(10);
    }
    //add login activity history
    public function addLoginActivity($user_agent,$activity=''){
        try {

            $loginActivity            = new LoginActivity();
            $loginActivity->user_id   = Auth::user()->id;
            $loginActivity->activity  = $activity;
            $loginActivity->ip        = \Request::ip();
            $loginActivity->browser   = UserBrowser($user_agent);
            $loginActivity->os        = UserOS($user_agent);
            $loginActivity->device    = UserDevice($user_agent);
            $loginActivity->country   = Location::get(\Request::ip()) == false? '' : Location::get(\Request::ip())->countryName;
            $loginActivity->country_code   = Location::get(\Request::ip()) == false? '' : \Str::lower(Location::get(\Request::ip())->countryCode);
            $loginActivity->save();
            return true;
        } catch (\Throwable $th) {

            return false;
        }

    }
}
