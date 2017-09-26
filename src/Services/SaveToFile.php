<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 26/09/17
 * Time: 14:22
 */

namespace App\Services;


class SaveToFile
{
    public function saveToFile($contact)
    {
        $file = '../src/form.txt';
        $person = get_object_vars($contact);
        file_put_contents($file, $person, FILE_APPEND);
    }
}
