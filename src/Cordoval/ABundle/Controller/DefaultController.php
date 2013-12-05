<?php

namespace Cordoval\ABundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CordovalABundle:Default:index.html.twig', array());
    }
}
