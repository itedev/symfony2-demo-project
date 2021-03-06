<?php

namespace ITE\DemoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * CountryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CountryRepository extends EntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getWithoutRussiaQueryBuilder()
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.id != :countryId')
            ->setParameter('countryId', 190);
    }
}
