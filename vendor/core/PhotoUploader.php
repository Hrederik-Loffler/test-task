<?php
namespace Vendor\Core;

use Exception;
class PhotoUploader
{
    public static $path;
    private static $suportedFormat = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/svg'];

    public static function upload($file)
    {
        if (is_array($file)) {
            if (in_array($file['type'], self::$suportedFormat)) {
                move_uploaded_file($file['tmp_name'], __DIR__ . '/../../public/img/avatar/' . $file['name']);
                self::$path = '/img/avatar/' . $_FILES['avatar']['name'];
                echo 'File has been uploaded!';
            } else {
                throw new Exception('File format not supported!');
            }
        } else {
            throw new Exception('No file was uploaded!');
        }
    }

    
}
