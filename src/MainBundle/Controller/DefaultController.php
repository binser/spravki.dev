<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Order;
use MainBundle\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainBundle::index.html.twig', array());
    }

    public function contactsAction()
    {
        return $this->render('MainBundle::contacts.html.twig', array());
    }

    public function priceAction()
    {
        $categories = $this->getDoctrine()->getRepository('MainBundle:CategoryDocument')->findAll();
        return $this->render('MainBundle::price-list.html.twig', array(
            'categories' => $categories
        ));
    }

    public function deliveryAction()
    {
        return $this->render('MainBundle::delivery.html.twig', array());
    }

    public function staffAction()
    {
        $staffs = $this->getDoctrine()->getRepository('MainBundle:Staff')->findAll();
        return $this->render('MainBundle::stuff.html.twig', array(
            'staffs' => $staffs
        ));
    }

    public function spravkaAction($url)
    {
        $spravka = $this->getDoctrine()->getRepository('MainBundle:Document')->findOneBy(array('url' => $url));
        if (!$spravka) {
            $post = $this->getDoctrine()->getRepository('MainBundle:Post')->findOneBy(array('url' => $url));
            if (!$post) {
                return $this->createNotFoundException();
            }

            return $this->render('MainBundle::post.html.twig', array(
                'post' => $post,
            ));

        }

        return $this->render('MainBundle::spravka.html.twig', array(
            'spravka' => $spravka
        ));
    }

    public function popularAction()
    {
        $order = new Order();
        $form = $this->createForm(new OrderType(), $order);

        $popular = $this->getDoctrine()->getRepository('MainBundle:Document')->getPopular();
        return $this->render('MainBundle:Common:popylar.html.twig', array(
            'popular' => $popular,
            'form' => $form->createView()
        ));
    }

    public function createOrderAction(Request $request)
    {
        $order = new Order();
        $form = $this->createForm(new OrderType(), $order);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            $mailer = $this->get('mailer');

            $message = \Swift_Message::newInstance()
                ->setSubject('Заказ с сайта msk-medspravki.ru')
                ->setFrom(array('no-reply@sweet-smoke.org' => 'msk-medspravki'))
                ->setTo(array('bins91@mail.ru', 'Nanat111@yandex.ru'))
                ->setContentType('text/html')
                ->setBody($this->renderView("MainBundle:Messages:new_order.html.twig",
                    array(
                        'fio' => $order->getFio(),
                        'address' => $order->getAddress(),
                        'email' => $order->getEmail(),
                        'phone' => $order->getPhone(),
                        'subject' => $order->getSubject(),
                        'message' => $order->getMessage(),
                        'date' => $order->getDateCreate()
                    )
                ));
            $message->attach(\Swift_Attachment::fromPath($order->getAbsolutePath()));

            $mailer->send($message);

            return new JsonResponse();
        } else {
            $errors = array();
            $errorString = (string) $form->getErrors(true, false);
            $errorString = trim(preg_replace('/:\s+?ERROR:\s/', '=', $errorString), "\n");
            $errorsArray = explode("\n", $errorString);
            foreach($errorsArray as $errorString) {
                $oneErrorArray = explode('=', $errorString);
                if (isset($oneErrorArray[0], $oneErrorArray[1])) {
                    $errors[$oneErrorArray[0]] = $oneErrorArray[1];
                }
            }

            return new JsonResponse($errors);
        }
    }

    public function postsListAction()
    {
        $posts = $this->getDoctrine()->getRepository('MainBundle:Post')->findAll();
        return $this->render('MainBundle::posts_list.html.twig', array(
            'posts' => $posts
        ));
    }
}
