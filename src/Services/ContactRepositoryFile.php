<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 26/09/17
 * Time: 14:22
 */

namespace App\Services;


use App\Entity\Contact;
use App\Interfaces\ContactRepositoryInterface;

class ContactRepositoryFile implements ContactRepositoryInterface
{
    public function save(Contact $contact)
    {
        $fp = fopen('../var/export/file.csv', 'a');
        $contactToExport = [
            $contact->getFirstname(),
            $contact->getLastname(),
            $contact->getSociety(),
            $contact->getFunction(),
            $contact->getPhone(),
            $contact->getEmail(),
            $contact->getAddress(),
            $contact->getPostalCode(),
            $contact->getCity(),
            $contact->getMessage(),
            ];
        fputcsv($fp, $contactToExport);
        fclose($fp);
    }
}
