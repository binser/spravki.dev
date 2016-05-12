<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Document;

class LoadDocumentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // анализы
        $document1 = new Document();
        $document1->setName('Анализ кала / форма  219у');
        $document1->setPrice(900);
        $document1->setImage('bundles/main/images/spravki/analises/1-1.jpg');
        $document1->setHeader('Купить анализы кала в Москве можно у нас');
        $document1->setUrl('analiz-kala-forma-219-u');
        $document1->setTitle('Купить анализы кала в Москве за 700р - «msk-medspravki»');
        $document1->setDescription('Любые виды анализов мочи, крови, кала можно купить в нашем мед учереждении.');
        $document1->setKeywords('Анализы кала купить');
        $document1->setPopular(0);
        $document1->setCategory($this->getReference('category-analize'));

        $document2 = new Document();
        $document2->setName('Анализ крови / форма  224у');
        $document2->setPrice(900);
        $document2->setImage('bundles/main/images/spravki/analises/2-1.jpg');
        $document2->setHeader('В нашем медицинском центре можно купить анализы крови с доставкой по Москве');
        $document2->setUrl('analiz-krovi-forma-224u');
        $document2->setTitle('Быстро купить анализ крови в Москве за 700р - «msk-medspravki»');
        $document2->setDescription('Любые виды анализов крови можно купить в нашем мед учреждении.');
        $document2->setKeywords('анализ крови (общий) по форме 224');
        $document2->setPopular(0);
        $document2->setCategory($this->getReference('category-analize'));


        $document3 = new Document();
        $document3->setName('Анализ мочи / форма  210у');
        $document3->setPrice(900);
        $document3->setImage('bundles/main/images/spravki/analises/1-1.jpg');
        $document3->setHeader('Купить анализы кала в Москве можно у нас');
        $document3->setUrl('analiz-mochi-forma-210u');
        $document3->setTitle('Купить анализ мочи в Москве за 700р - «msk-medspravki»');
        $document3->setDescription('Любые виды анализов мочи можно купить в нашем мед учереждении.');
        $document3->setKeywords('Анализы мочи купить');
        $document3->setPopular(0);
        $document3->setCategory($this->getReference('category-analize'));

        $manager->persist($document1);
        $manager->persist($document2);
        $manager->persist($document3);
        $manager->flush();




/*        $this->addReference('category-dispancer', $category2);
        $this->addReference('category-students', $category3);
        $this->addReference('category-work', $category4);*/
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}