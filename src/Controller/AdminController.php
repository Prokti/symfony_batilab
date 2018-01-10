<?php

namespace App\Controller;

use Doctrine\ORM\Query\Expr\Base;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    /**
     * @Route("/cokpit", name="admin_cokpit")
     */
    public function cokpit()
    {
        // replace this line with your own code!
        return $this->render('admin/cokpit.html.twig');
    }
}
