<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Order;
use MainBundle\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainBundle::index.html.twig', array(
            'popular' => $this->getPopularDocuments()
        ));
    }

    public function contactsAction()
    {
        return $this->render('MainBundle::contacts.html.twig', array(
            'popular' => $this->getPopularDocuments()
        ));
    }

    public function priceAction()
    {
        $categories = $this->getDoctrine()->getRepository('MainBundle:CategoryDocument')->findAll();
        return $this->render('MainBundle::price-list.html.twig', array(
            'popular' => $this->getPopularDocuments(),
            'categories' => $categories
        ));
    }

    public function deliveryAction()
    {
        return $this->render('MainBundle::delivery.html.twig', array(
                'popular' => $this->getPopularDocuments()
            ));
    }

    public function staffAction()
    {
        $staffs = $this->getDoctrine()->getRepository('MainBundle:Staff')->findAll();
        return $this->render('MainBundle::stuff.html.twig', array(
            'popular' => $this->getPopularDocuments(),
            'staffs' => $staffs
        ));
    }

    public function spravkaAction($spravkaUrl)
    {
        $spravka = $this->getDoctrine()->getRepository('MainBundle:Document')->findOneBy(array('url' => $spravkaUrl));
        if (!$spravka) {
            return $this->createNotFoundException();
        }

        return $this->render('MainBundle::spravka.html.twig', array(
            'popular' => $this->getPopularDocuments(),
            'spravka' => $spravka
        ));
    }

    private function getPopularDocuments()
    {
        return $this->getDoctrine()->getRepository('MainBundle:Document')->getPopular();
    }

    public function popularAction(Request $request)
    {
        $order = new Order();
        $form = $this->createForm(new OrderType(), $order);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return new RedirectResponse($this->generateUrl('main_price'));
        }

        $popular = $this->getDoctrine()->getRepository('MainBundle:Document')->getPopular();
        return $this->render('MainBundle:Common:popylar.html.twig', array(
            'popular' => $popular,
            'form' => $form->createView()
        ));
    }
}
