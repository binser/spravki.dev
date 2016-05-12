<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Staff;

class LoadStaffData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $staff1 = new Staff();
        $staff1->setFio('Брусенко Валентина Григорьевна');
        $staff1->setPost('врач-терапевт');
        $staff1->setImage('bundles/main/images/doctor1.jpg');
        $staff1->setImageAltTag('врач');

        $staff2 = new Staff();
        $staff2->setFio('Тумаев Алексей Владимирович');
        $staff2->setPost('врач-хирург');
        $staff2->setImage('bundles/main/images/doctor2.jpg');
        $staff2->setImageAltTag('врач');

        $staff3 = new Staff();
        $staff3->setFio('Демкина Ольга Николаевна');
        $staff3->setPost('врач акушер');
        $staff3->setImage('bundles/main/images/doctor3.jpg');
        $staff3->setImageAltTag('врач');

        $staff4 = new Staff();
        $staff4->setFio('Евсеев Алексей Алексеевич');
        $staff4->setPost('Главный doctor');
        $staff4->setImage('bundles/main/images/doctor4.jpg');
        $staff4->setImageAltTag('врач');

        $staff5 = new Staff();
        $staff5->setFio('Головина Юлия Арсеньевна');
        $staff5->setPost('Старшая медицинская сестра');
        $staff5->setImage('bundles/main/images/doctor5.jpg');
        $staff5->setImageAltTag('врач');

        $manager->persist($staff1);
        $manager->persist($staff2);
        $manager->persist($staff3);
        $manager->persist($staff4);
        $manager->persist($staff5);
        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}