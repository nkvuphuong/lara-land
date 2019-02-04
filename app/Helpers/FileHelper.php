<?php
/**
 * Created by PhpStorm.
 * User: PhuongNKV
 * Date: 11/6/2018
 * Time: 8:15 PM
 */

namespace App\Helpers;

use Carbon\Carbon;

class FileHelper
{
    /**
     * @param $input : name of file input
     * @param $dir : directory to store file
     * @param null $fileName : prefix of file name
     * @param null $oldFilePath : remove old file (path)
     * @return false|string
     */
    static public function upload($input, $dir, $fileName = null, $oldFilePath = null)
    {
        if (request()->hasFile($input)) {
            $image = request()->file($input);
            $fileName = $fileName ? str_slug($fileName, '-') . '-' . time() . '.' . $image->getClientOriginalExtension() : [];

            if ($path = $image->move('storage/' . $dir . '/' . Carbon::now()->format('Y/m/d'), $fileName)) {
                if ($oldFilePath && static::fileExist($oldFilePath)) {
                    \File::delete($oldFilePath);
                }
            }

            return $path;
        } else {
            return false;
        }
    }

    /**
     * @param $path
     * @return bool
     */
    static public function fileExist($path)
    {
        return file_exists(public_path($path)) && is_file($path);
    }

    /**
     * @param $path
     * @return string
     */
    static public function imageSrc($path)
    {
        return static::fileExist($path) ? asset($path) : asset('images/no-image.png');
    }
}