<?php

namespace App\Repository;

use App\Entity\PictureMen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PictureMen|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureMen|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureMen[]    findAll()
 * @method PictureMen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureMenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureMen::class);
    }

    // /**
    //  * @return PictureMen[] Returns an array of PictureMen objects
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
    public function findOneBySomeField($value): ?PictureMen
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
