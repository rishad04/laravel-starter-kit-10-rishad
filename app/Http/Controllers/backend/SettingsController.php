<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Settings\GeneralSettingsUpdateRequest;
use App\Http\Requests\Settings\MailSettingsRequest;
use App\Http\Requests\Settings\RecaptchaSettingsRequest;
use App\Repositories\Settings\Backup\BackupInterface;
use App\Repositories\Settings\GeneralSetting\GeneralSettingsInterface;
use App\Repositories\Settings\MailSetting\MailSettingInterface;
use App\Repositories\Settings\SettingsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        session()->put('locale', $language);
        return redirect()->back();
    }
}
