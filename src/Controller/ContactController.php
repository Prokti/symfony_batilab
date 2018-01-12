<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Contact;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {


        $em = $this->getDoctrine()->getRepository(Contact::class)->findAll();

        return $this->json($em);

   }

   /**
    * @Route("/contacts", name="contacts")
    * @Method("GET")
    */
   public function show()
   {
       $contacts = $this->getDoctrine()->getRepository(Contact::class)->findAll();



       $data = [
           'contacts' => $contacts,
       ];

       return new JsonResponse($data);
   }


}
