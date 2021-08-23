<?php

namespace App\Repository;

use App\Entity\Condconvoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Condconvoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Condconvoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Condconvoyage[]    findAll()
 * @method Condconvoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CondconvoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Condconvoyage::class);
    }

    // /**
    //  * @return Condconvoyage[] Returns an array of Condconvoyage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Condconvoyage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
