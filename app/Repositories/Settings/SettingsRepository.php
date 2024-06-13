<?php

namespace App\Repositories\Settings;

use App\Models\Currency;
use App\Mail\SendTestMail;
use App\Models\Backend\Setting;
use App\Traits\ReturnFormatTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Upload\UploadInterface;

class SettingsRepository implements SettingsInterface
{
    use ReturnFormatTrait;

    private $model, $upload;

    public function __construct(Setting $model, UploadInterface $upload)
    {
        $this->model = $model;
        $this->upload = $upload;
    }


    // UpdateGeneralSettings
    public function UpdateSettings($request)
    {
        try {

            if ($request->has('currency_code')) {
                $currency   = Currency::where('code', $request->currency_code)->first();
                $request->merge(['currency_symbol' => $currency->symbol]);
            }

            DB::beginTransaction();


            $ignore    = [];
            $ignore[] = '_token';
            $ignore[] = '_method';

            $images_keys = ['favicon', 'dark_logo', 'light_logo', 'og_image'];

            foreach ($request->except($ignore) as $key => $value) {
                $settings       = Setting::where('key', $key)->first();

                if (!$settings) {
                    $settings       = new Setting();
                    $settings->key  = $key;
                }

                if (in_array($key, $images_keys)) {
                    $settings->value    = $this->upload->uploadImage($value, 'settings/', [], $settings->value);
                } elseif ($key == 'mail_password') {
                    $settings->value   = encrypt($value);
                } else {
                    $settings->value   = $value;
                }

                $settings->save();
            }

            DB::commit();

            Cache::forget('settings');

            return $this->responseWithSuccess(___('alert.successfully_updated'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseWithError(___('alert.something_went_wrong'));
        }
    }

    //database backup
    public function dbBackupDownload()
    {
        try {

            $mysqlHostName      = env('DB_HOST');
            $mysqlUserName      = env('DB_USERNAME');
            $mysqlPassword      = env('DB_PASSWORD');
            $DbName             = env('DB_DATABASE');


            $tables = array();

            $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

            $get_all_table_query = "SHOW TABLES";
            $statement = $connect->prepare($get_all_table_query);
            $statement->execute();
            $result = $statement->fetchAll();

            foreach ($result as $row) {
                $tables[] = $row[0];
            }

            $output = '';
            foreach ($tables as $table) {
                $show_table_query = "SHOW CREATE TABLE " . $table . "";
                $statement = $connect->prepare($show_table_query);
                $statement->execute();
                $show_table_result = $statement->fetchAll();

                foreach ($show_table_result as $show_table_row) {
                    $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
                }
                $select_query = "SELECT * FROM " . $table . "";
                $statement = $connect->prepare($select_query);
                $statement->execute();
                $total_row = $statement->rowCount();

                for ($count = 0; $count < $total_row; $count++) {
                    $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                    $table_column_array = array_keys($single_result);
                    $table_value_array = array_values($single_result);
                    $output .= "\nINSERT INTO $table (";
                    $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                    $output .= "'" . implode("','", $table_value_array) . "');\n";
                }
            }
            $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
            $file_handle = fopen($file_name, 'w+');
            fwrite($file_handle, $output);
            fclose($file_handle);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_name));
            ob_clean();
            flush();
            readfile($file_name);
            unlink($file_name);

            return true;
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    public function mailSendTest($request)
    {
        try {

            if (settings('mail_driver') == 'sendmail') :
                \config([
                    'mail.mailers.sendmail.path' => settings('sendmail_path'),
                ]);
            endif;

            \config([
                'mail.default'                 => settings('mail_driver'),
                'mail.mailers.smtp.host'       => settings('mail_host'),
                'mail.mailers.smtp.port'       => settings('mail_port'),
                'mail.mailers.smtp.encryption' => settings('mail_encryption'),
                'mail.mailers.smtp.username'   => settings('mail_username'),
                'mail.mailers.smtp.password'   => settings('mail_password'),
                'mail.from.address'            => settings('mail_address'),
                'mail.from.name'               => settings('mail_name')
            ]);

            Mail::to($request->email)->send(new SendTestMail);

            return $this->responseWithSuccess(___('alert.mail_successfully_sended'), []);
        } catch (\Throwable $th) {
            return $this->responseWithError(___('alert.mail_not_send'), []);
        }
    }
}
