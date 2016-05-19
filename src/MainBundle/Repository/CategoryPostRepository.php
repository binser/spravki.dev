<?php

namespace MainBundle\Repository;

/**
 * CategoryPostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryPostRepository extends \Doctrine\ORM\EntityRepository
{
    public function getFirstCategory()
    {
        $minCategoryID = $this->createQueryBuilder('cat')
            ->select('min(cat.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->find($minCategoryID);
    }
}
