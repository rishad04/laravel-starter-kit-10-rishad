<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Settings\GeneralSettingsUpdateRequest;
use App\Http\Requests\Settings\MailSettingsRequest;

use App\Repositories\Settings\Backup\BackupInterface;
use App\Repositories\Settings\GeneralSetting\GeneralSettingsInterface;
use App\Repositories\Settings\MailSetting\MailSettingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingsController extends Controller
{

    protected $repo, $backupRepo;

    public function __construct(GeneralSettingsInterface $repo, BackupInterface $backupRepo)
    {
        $this->repo     = $repo;
        $this->backupRepo     = $backupRepo;
    }

    public function generalSettings()
    {
        return view('backend.setting.general_settings.index');
    }

    public function updateGeneralSettings(GeneralSettingsUpdateRequest $request)
    {
        $result = $this->repo->update($request);
        if ($result['status']) {
            return redirect()->route('settings.general.index')->with('success', $result['message']);
        }
        return back()->with('danger', $result['message'])->withInput();
    }

    public function mailSettings()
    {
        return view('backend.setting.mail.index');
    }

    public function updateMailSettings(MailSettingsRequest $request, MailSettingInterface $repo)
    {
        $result = $repo->update($request->validated());
        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }
        return back()->with('danger', $result['message']);
    }


    public function setLocalization($language)
    {
        App::setLocale($language);
        session()->put('locale', $language);
        return redirect()->back();
    }

    // Database Backup 
    public function databaseBackupIndex()
    {
        return view('backend.setting.backup.index');
    }

    public function BackupDownload()
    {
        if ($this->backupRepo->backupDownload()) {
            return redirect()->route('backup.index');
        }
        return redirect()->back();
    }
}
