<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Backend\Setting;
use App\Models\Upload;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = collect($this->settings());
        $settings->each(fn ($setting) => Setting::create($setting));
    }

    private function settings(): array
    {
        return [

            ['key' => 'name',             'value' => 'Parcel Fly'],
            ['key' => 'phone',            'value' => '+8802999888'],
            ['key' => 'email',            'value' => 'info@parcelfly.com'],
            ['key' => 'copyright',              'value' => 'All rights reserved. Development by Parcel Fly Developers.'],

            ['key' => 'logo',                   'value' => DB::table('uploads')->insertGetId(['original' => 'backend/images/logo.png'])],
            ['key' => 'favicon',                'value' => DB::table('uploads')->insertGetId(['original' => 'backend/images/favicon.png'])],

            ['key' => 'mail_sendmail_path',     'value' => '/usr/sbin/sendmail -bs -i'],
            ['key' => 'mail_driver',            'value' => 'smtp'],
            ['key' => 'mail_host',              'value' => 'smtp.mailtrap.io'],
            ['key' => 'mail_port',              'value' => '2525'],
            ['key' => 'mail_username',          'value' => 'd9f98a444876e4'],
            ['key' => 'mail_password',          'value' => 'ad457b5e0ad2cd'],
            ['key' => 'mail_encryption',        'value' => 'tls'],
            ['key' => 'mail_from_address',      'value' => 'admin@example.com'],
            ['key' => 'mail_from_name',         'value' => 'Example Name'],
            ['key' => 'mail_signature',         'value' => 'Example Signature'],


            ['key' => 'facebook_client_id',     'value' => '456479846546456456'],
            ['key' => 'facebook_client_secret', 'value' => '45d4fsd454dgd465g4'],
            ['key' => 'facebook_status',        'value' => StatusEnum::ACTIVE],

            ['key' => 'google_client_id',       'value' => '73uou5.dg54df.google-user-content.com'],
            ['key' => 'google_client_secret',   'value' => 'gdg4d5g4fg5d4g6d4g546'],
            ['key' => 'google_status',          'value' => StatusEnum::ACTIVE],



        ];
    }
}
