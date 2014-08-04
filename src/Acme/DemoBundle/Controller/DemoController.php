<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Form\OptionNumberType;
use Acme\DemoBundle\Form\OptionTextType;
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
     * @Route("/text", name="_demo")
     */
    public function indexAction()
    {
        /** @var \Symfony\Component\Form\FormFactory $factory */
        $factory = $this->get('form.factory');
        $text = $factory->createNamed('option', new OptionTextType());

        return $this->render('AcmeDemoBundle:Demo:option_text.html.twig', array(
                'form' => $text->createView(),
            )
        );
    }

    /**
     * @Route("/number", name="_demo_2")
     */
    public function numberAction()
    {
        /** @var \Symfony\Component\Form\FormFactory $factory */
        $factory = $this->get('form.factory');
        $number = $factory->createNamed('option', new OptionNumberType());

        return $this->render('AcmeDemoBundle:Demo:option_number.html.twig', array(
                'form' => $number->createView(),
            )
        );
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
