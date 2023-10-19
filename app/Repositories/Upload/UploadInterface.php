<?php

namespace App\Repositories\Upload;

interface UploadInterface
{

    // public function upload($folder, $image_id, $new_image); //folder = folder name,image_id = existing image id , new_image = upload new image

    // public function unlinkImage($image_id); //pass only image id

    public function uploadImage($image, $path, $image_sizes, $old_upload_id);

    public function deleteImage($old_upload_id, $slug);
}
