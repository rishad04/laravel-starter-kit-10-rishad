<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\Settings\SettingsInterface;
use App\Http\Requests\Settings\MailSettingsRequest;
use App\Repositories\Settings\Backup\BackupInterface;
use App\Http\Requests\Settings\RecaptchaSettingsRequest;
use App\Http\Requests\Settings\GeneralSettingsUpdateRequest;
use App\Repositories\Settings\MailSetting\MailSettingInterface;
use App\Repositories\Settings\GeneralSetting\GeneralSettingsInterface;

class SettingsController extends Controller
{

    protected $repo;

    public function __construct(SettingsInterface $repo)
    {
        $this->repo     = $repo;
    }

    public function generalSettings()
    {
        return view('backend.settings.general_settings.index');
    }

    public function updateGeneralSettings(GeneralSettingsUpdateRequest $request, GeneralSettingsInterface $generalSettingsRepo)
    {
        $result = $generalSettingsRepo->update($request);

        if ($result['status']) {
            return redirect()->route('settings.general.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }

    public function mailSettings()
    {
        return view('backend.settings.mail.index');
    }

    public function updateMailSettings(MailSettingsRequest $request, MailSettingInterface $mailSettingsRepo)
    {
        $result = $mailSettingsRepo->update($request->validated());
        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }


    public function recaptcha()
    {
        return view('backend.settings.recaptcha.index');
    }

    public function updateRecaptcha(RecaptchaSettingsRequest $request)
    {
        $result = $this->repo->update($request->validated());
        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }

    // Database Backup
    public function databaseBackupIndex()
    {
        return view('backend.settings.backup.index');
    }

    public function BackupDownload(BackupInterface $backupRepo)
    {
        if ($backupRepo->backupDownload()) {
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
