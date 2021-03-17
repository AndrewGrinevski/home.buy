<?php


namespace App\Traits;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


trait CreateUpdateImagesTrait
{

public static function createImages($requestImages, $params)
{
    $paths = [];
    $names = [];

    foreach ($requestImages as $file) {
        $paths[] = $file->store(Controller::PATH_IMG);
        $names[] = $file->hashName();
    }

    $params['first_img_name'] = $names[0];
    $params['second_img_name'] = $names[1];
    $params['third_img_name'] = $names[2];
    $params['four_img_name'] = $names[3];
    $params['five_img_name'] = $names[4];

    return $params;
}

    public static function updateImages($images, $issetRequestImages,$requestImages)
    {
        $paths = [];
        $names = [];

        if ($issetRequestImages != null) {

            Storage::delete([Controller::PATH_IMG.$images->first_img_name,Controller::PATH_IMG.$images->second_img_name, Controller::PATH_IMG.$images->third_img_name,
                Controller::PATH_IMG.$images->four_img_name, Controller::PATH_IMG.$images->five_img_name]);

            foreach ($requestImages as $file) {
                $paths[] = $file->store(Controller::PATH_IMG);
                $names[] = $file->hashName();
            }

            $images['first_img_name'] = $names[0];
            $images['second_img_name'] = $names[1];
            $images['third_img_name'] = $names[2];
            $images['four_img_name'] = $names[3];
            $images['five_img_name'] = $names[4];

           return $images->save();
        }
    }

}
