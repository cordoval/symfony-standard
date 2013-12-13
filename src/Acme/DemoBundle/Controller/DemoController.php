<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Category;
use Acme\DemoBundle\Entity\Ship;
use Acme\DemoBundle\Form\ShipType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction()
    {
        $ship = new Ship();
        $cat = new Category();
        $cat->setName('cat1');
        $ship->setCategory($cat);
        $ship->setShipName('some ship');
        $form = $this->createForm(new ShipType(), $ship);

        return array('form' => $form->createView());
    }

    /**
     * @Route("/hello/{name}", name="_demo_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/contact", name="_demo_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $mailer = $this->get('mailer');

            // .. setup a message and send it
            // http://symfony.com/doc/current/cookbook/email.html

            $request->getSession()->getFlashBag()->set('notice', 'Message sent!');

            return new RedirectResponse($this->generateUrl('_demo'));
        }

        return array('form' => $form->createView());
    }
}
