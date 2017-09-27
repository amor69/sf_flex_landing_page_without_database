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
use App\Services\SaveToFile;
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
     * @param SaveToFile $saveToFile
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contact(Request $request, SaveToFile $saveToFile)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isValid() ) {
            $data = $form->getData();
            $saveToFile = $this->get(SaveToFile::class)->saveToFile($data);

           return $this->redirectToRoute('home');
        }

        return $this->render('form/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
