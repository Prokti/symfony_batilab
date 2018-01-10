<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\House;

class HouseController extends Controller
{
    /**
     * @Route("/house", name="house")
     */
    public function index()
    {
        // replace this line with your own code!
        $em = $this->getDoctrine()->getManager();

        $house = new House();
        $house->setName('Natizen4');
        $house->setPriceHt(125000);

        $em->persist($house);
        $em->flush();

        return new Response('Maison Saved : ' .$house->getId());
    }

    /**
     * @Route("/house/{id}", name="product_show")
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(House::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No house found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
