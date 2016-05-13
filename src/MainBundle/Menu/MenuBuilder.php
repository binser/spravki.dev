<?php

namespace MainBundle\Menu;

use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     * @param EntityManager $em
     */
    public function __construct(FactoryInterface $factory, EntityManager $em)
    {
        $this->factory = $factory;
        $this->em = $em;
    }

    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));

        $menu->addChild('Главная', array('route' => 'main_homepage'));
        $menu->addChild('Прайс-лист', array('route' => 'main_price'));
        $menu->addChild('Доставка и оплата', array('route' => 'main_delivery'));
        $menu->addChild('Наши сотрудники', array('route' => 'main_staff'));
        $menu->addChild('Контакты', array('route' => 'main_contact'));

        return $menu;
    }
}