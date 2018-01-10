<?php

namespace App\Controller;

use App\Entity\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        // replace this line with your own code!
        $em = $this->getDoctrine()->getRepository(Contact::class)->findAll();

        return $this->render('contact/list.html.twig', [
            'em' => $em
        ]);


    }
}
