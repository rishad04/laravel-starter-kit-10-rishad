<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\GeneralSettingsUpdateRequest;
use App\Repositories\Settings\GeneralSettingsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingsController extends Controller
{

    protected $repo;

    public function __construct(GeneralSettingsInterface $repo)
    {
        $this->repo     = $repo;
    }

    public function index()
    {
        return view('backend.setting.general_settings.index');
    }

    public function update(GeneralSettingsUpdateRequest $request)
    {
        $result = $this->repo->update($request);
        if ($result['status']) {
            return redirect()->route('settings.general.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }






    public function setLocalization($language)
    {
        App::setLocale($language);
        session()->put('locale', $language);
        return redirect()->back();
    }
}
