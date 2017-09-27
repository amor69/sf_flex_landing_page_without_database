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

class ContactRepositoryDatabase implements ContactRepositoryInterface
{
    public function save(Contact $contact)
    {
    }
}