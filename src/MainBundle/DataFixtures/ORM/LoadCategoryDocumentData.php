<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\CategoryDocument;

class LoadCategoryDocumentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new CategoryDocument();
        $category1->setName('Анализы');

        $category2 = new CategoryDocument();
        $category2->setName('Справки из диспансера');

        $category3 = new CategoryDocument();
        $category3->setName('Справки для студентов');

        $category4 = new CategoryDocument();
        $category4->setName('Справки для работы');

        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->flush();

        $this->addReference('category-analize', $category1);
        $this->addReference('category-dispancer', $category2);
        $this->addReference('category-students', $category3);
        $this->addReference('category-work', $category4);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}