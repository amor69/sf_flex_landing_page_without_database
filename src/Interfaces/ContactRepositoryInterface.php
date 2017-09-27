<?php
/**
 * Created by PhpStorm.
 * User: abounechada
 * Date: 27/09/17
 * Time: 11:26
 */

namespace App\Interfaces;


use App\Entity\Contact;

interface ContactRepositoryInterface
{
    public function save(Contact $contact);

}