<?php

namespace App\Repository;

use App\Entity\PictureWomen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PictureWomen|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureWomen|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureWomen[]    findAll()
 * @method PictureWomen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureWomenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureWomen::class);
    }

    // /**
    //  * @return PictureWomen[] Returns an array of PictureWomen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PictureWomen
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
