<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\Language\LanguageInterface;
use App\Repositories\Settings\SettingsInterface;

class SettingsController extends Controller
{
    protected $repo;
    protected $repoLang;

    public function __construct(SettingsInterface $repo, LanguageInterface $repoLang)
    {
        $this->repo         = $repo;
        $this->repoLang     = $repoLang;
    }

    public function generalSettings()
    {
        $languages = $this->repoLang->activelang();
        return view('backend.settings.general_settings.index', compact('languages'));
    }

    public function updateSettings(Request $request)
    {
        $result = $this->repo->UpdateSettings($request);

        if ($result['status']) {
            return back()->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }

    public function mailSettings()
    {
        return view('backend.settings.mail.index');
    }



    public function recaptcha()
    {
        return view('backend.settings.recaptcha.index');
    }

    // Database Backup
    public function databaseBackupIndex()
    {
        return view('backend.settings.backup.index');
    }

    public function databaseBackupDownload()
    {
        if ($this->repo->dbBackupDownload()) {
            return redirect()->route('backup.index');
        }
        return redirect()->back();
    }

    public function setLocalization($language)
    {
        App::setLocale($language);
        Session::put('locale', $language);
        return redirect()->back();
    }
}
