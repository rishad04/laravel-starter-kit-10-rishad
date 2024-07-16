<?php

namespace App\Repositories\Upload;

interface UploadInterface
{
    public function uploadImage($image, $path, array $image_sizes = [], $old_upload_id = null);

    public function deleteImage($old_upload_id, $slug);

<<<<<<< HEAD
    function uploadSeederByPath(string $sourcePath = null, string $uploadDirectory = "assets", string $namePrefix = 'copy');
=======
    public function uploadSeederByPath(string $sourcePath = null, string $uploadDirectory = "assets", string $namePrefix = 'copy');
>>>>>>> origin/master
}
