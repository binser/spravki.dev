<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        $spravka = $this->getDoctrine()->getRepository('MainBundle:Document')->findBy(array('url' => $spravkaUrl));
        return $this->render('MainBundle::spravka.html.twig', array(
            'popular' => $this->getPopularDocuments(),
            'spravka' => $spravka
        ));
    }

    private function getPopularDocuments()
    {
        return $this->getDoctrine()->getRepository('MainBundle:Document')->getPopular();
    }
}
