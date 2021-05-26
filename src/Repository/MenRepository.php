<?php

namespace App\Repository;

use App\Entity\Men;
use App\Entity\ModeleSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Men|null find($id, $lockMode = null, $lockVersion = null)
 * @method Men|null findOneBy(array $criteria, array $orderBy = null)
 * @method Men[]    findAll()
 * @method Men[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Men::class);
    }

    public function countMen()
    {
        return $this->createQueryBuilder('m')
            ->select('count(m.id) as nombre_homme')
            ->getQuery()
            ->getSingleResult();
    }

    public function averageMen()
    {
        return $this->createQueryBuilder('w')
            ->select('avg((SUBSTRING(CURRENT_DATE(), 1, 4) - SUBSTRING(w.date_of_birth, 7, 10))) as age')
            ->getQuery()
            ->getSingleResult();
    }

    public function findAllVisibleQuery(ModeleSearch $search)
    {
        $query = $this->createQueryBuilder('w')
            ->select('w');

        if($search->getFirstname())
        {
            $query = $query
                ->andWhere('w.firstname = :firstname')
                ->setParameter(':firstname', $search->getFirstname());
        }

        if($search->getLastname())
        {
            $query = $query
                ->andWhere('w.lastname = :lastname')
                ->setParameter(':lastname', $search->getLastname());
        }

        if($search->getDateOfBirth())
        {
            $query = $query
                ->andWhere('w.date_of_birth = :date_of_birth')
                ->setParameter(':date_of_birth', $search->getDateOfBirth());
        }

        if($search->getClothingSize())
        {
            $query = $query
                ->andWhere('w.clothing_size = :clothing_size')
                ->setParameter(':clothing_size', $search->getClothingSize());
        }

        if($search->getSize())
        {
            $query = $query
                ->andWhere('w.size = :size')
                ->setParameter(':size', $search->getSize());
        }

        if($search->getHairs())
        {
            $query = $query
                ->andWhere('w.hairs = :hairs')
                ->setParameter(':hairs', $search->getHairs());
        }

        if($search->getEyes())
        {
            $query = $query
                ->andWhere('w.eyes = :eyes')
                ->setParameter(':eyes', $search->getEyes());
        }

        return $query->getQuery();
           
    }

    // /**
    //  * @return Men[] Returns an array of Men objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Men
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
