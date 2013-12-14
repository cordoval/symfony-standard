<?php

namespace Acme\DemoBundle\Controller;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
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
        /** @var \Doctrine\ORM\EntityRepository $userRepository */
        $userRepository = $this->getDoctrine()->getRepository('AcmeDemoBundle:User');
        $date = '2013-12-02';
        $dateFrom = new \DateTime ($date);
        $dateTo = (new \DateTime ($date))->add(new \DateInterval('P1D'));

        // OK
        $criteria = new Criteria();
        $criteria
            ->where($criteria->expr()->gte('signedIn', $dateFrom))
            ->andWhere($criteria->expr()->lt('signedIn', $dateTo))
        ;
        //var_dump($userRepository->matching($criteria));

        // NOT OK - Doctrine\ORM\Query\QueryException "Invalid parameter number: number of bound variables does not match number of tokens"
        $criteria = new Criteria();
        $criteria
            ->where($criteria->expr()->gte('user.signedIn', $dateFrom))
            ->andWhere($criteria->expr()->lt('user.signedIn', $dateTo))
            ->orWhere ($criteria->expr()->eq ('user.signedIn', true))
        ;
        var_dump($userRepository->createQueryBuilder('user')
            ->addCriteria($criteria)
            ->getQuery()
            ->getResult()
        )
        ;die();

        // NOT OK - Doctrine\ORM\Query\QueryException "Invalid parameter number: number of bound variables does not match number of tokens"
        $criteria
            ->where($criteria->expr()->eq('user.active', true))
            ->andWhere($criteria->expr()->eq('user.active', true))
            //->orWhere ($criteria->expr ()->eq ('user.active', true))
        ;
        var_dump($userRepository->createQueryBuilder('user')
            ->addCriteria($criteria)
            ->getQuery()
            ->getResult()
        );

        return array();
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
