<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\HouseProduct;
use App\Entity\Product;
use App\Form\CategoryType;
use App\Form\HouseFormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\House;
use Symfony\Component\HttpFoundation\Request;



class HouseController extends Controller
{

    /**
     * @Route("/house/add", name="houseAdd")
     */
    public function addAction(Request $request)
    {
        // On crée un objet Advert
        $house = new House();

        // On crée le FormBuilder grâce au service form factory
       $form = $this->createFormBuilder($house)

        // On ajoute les champs de l'entité que l'on veut à notre formulaire

            ->add('name',      TextType::class)
            ->add('price_ht',     TextType::class)
            ->add('save',      SubmitType::class, array('label' => 'Créer House'))
           ->getForm()
        ;

       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid())
       {
           $house = $form->getData();

           $em = $this->getDoctrine()->getManager();
           $em->persist($house);
           $em->flush();

           $this->addFlash('notice', 'Enregistrement House OK');


           return $this->redirectToRoute('houseAdd');
       }

        $form = $this->createForm(HouseFormType::class);
        $formCategorie = $this->createForm(CategoryType::class);

        return $this->render('house/view.html.twig', [
            'houseForm' => $form->createView()
        ]);


    }

    /**
     * @Route("/house/view", name="houseView")
     */
    public function viewAction()
    {
        $form = $this->createForm(HouseFormType::class);
        $formCategorie = $this->createForm(CategoryType::class);

        return $this->render('house/view.html.twig', [
            'houseForm' => $form->createView()
        ]);
    }

    /**
     * @Route("house/test", name="houseTest")
     */
    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();

        $house = new House();
        $house->setName("Test Liaisons");
        $house->setPriceHt(12121212);

        $listProducts = $em->getRepository('App:Product')->findAll();

        foreach ($listProducts as $listProduct) {
            $houseProduct = new HouseProduct();

            $houseProduct->setHouse($house);
            $houseProduct->setProduct($listProduct);
            $houseProduct->setQuantity(99);

            $em->persist($houseProduct);
        }


        $em->persist($house);
        $em->flush();
    }

}
