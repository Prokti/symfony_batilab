<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("/api/hello/{name}/{arg2}")
     */
    public function apiExample($name, $arg2)
    {
        return $this->json([
            'name' => $name,
            'madara' => $arg2,
        ]);
    }

    /**
     * @Route("/api/rendu/{name}")
     */

    public function renduExample ($name)
    {
        return $this->render('api/rendu.html.twig', array('name' => $name));
    }
}
