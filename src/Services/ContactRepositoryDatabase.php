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
use Doctrine\ORM\EntityManager;

class ContactRepositoryDatabase 
{
    public function save(Contact $contact, EntityManager $em)
    {
        $em->persist($contact);
        $em->flush();
    }
}