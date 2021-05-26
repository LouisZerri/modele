<?php

namespace App\Repository;

use App\Entity\ModeleSearch;
use App\Entity\Women;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Women|null find($id, $lockMode = null, $lockVersion = null)
 * @method Women|null findOneBy(array $criteria, array $orderBy = null)
 * @method Women[]    findAll()
 * @method Women[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WomenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Women::class);
    }

    public function countWomen()
    {
        return $this->createQueryBuilder('w')
            ->select('count(w.id) as nombre_femme')
            ->getQuery()
            ->getSingleResult();
    }

    public function averageWomen()
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

        $query = $query->orderBy('w.id', 'ASC');

        return $query->getQuery();
           
    }

    // /**
    //  * @return Women[] Returns an array of Women objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Women
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
