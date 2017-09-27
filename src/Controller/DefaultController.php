<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 26/09/17
 * Time: 09:35
 */

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Services\ContactRepositoryDatabase;
use App\Services\ContactRepositoryFile;
use App\Services\SaveToFile;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('layout/index.html.twig');
    }

    /**
     * @Route(path="/contact", name="contact")
     * @param Request $request
     * @param ContactRepositoryDatabase $contactRepository
     * @param ContactRepositoryFile $contactRepositoryFile
     * @param EntityManager $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @internal param ContactRepositoryFile $contactRepositoryFile
     */
    public function contact(Request $request, ContactRepositoryDatabase $contactRepository, ContactRepositoryFile $contactRepositoryFile , EntityManager $em)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isValid() ) {
            $contact = $form->getData();

            $contactRepository->save($contact, $em);
            $contactRepositoryFile->save($contact);

            return $this->redirectToRoute('home');
        }

        return $this->render('form/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
