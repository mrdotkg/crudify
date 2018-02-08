<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }


    /**
     * @return array
     */
    public function findEverything()
    {
        return $this->createQueryBuilder()
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY );
    }

    /**
     * @param $price
     * @return array
     */
    public function findAllGreaterThanPrice($price): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.price > :price')
            ->setParameter('price', $price)
            ->orderBy('p.price', 'ASC')
            ->getQuery()
            ->getResult( Query::HYDRATE_ARRAY );
    }
}
