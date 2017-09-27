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
    public function saveToFile($data)
    {
//        $file = '../src/form.txt';
//        //$person = get_object_vars($data);
//        file_put_contents($file, (array)$data, FILE_APPEND);

        $fp = fopen('../var/export/file.csv', 'w');
        fputcsv($fp, (array)$data);
        fclose($fp);
    }
}
