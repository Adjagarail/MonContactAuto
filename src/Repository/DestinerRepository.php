<?php

namespace App\Repository;

use App\Entity\Destiner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Destiner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Destiner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Destiner[]    findAll()
 * @method Destiner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DestinerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Destiner::class);
    }

    // /**
    //  * @return Destiner[] Returns an array of Destiner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Destiner
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
