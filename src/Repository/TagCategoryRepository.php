<?php

namespace App\Repository;

use App\Entity\TagCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TagCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagCategory[]    findAll()
 * @method TagCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagCategory::class);
    }

    // /**
    //  * @return TagCategory[] Returns an array of TagCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TagCategory
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
