<?php

namespace App\Repository;

use App\Entity\Convoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Convoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Convoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Convoyage[]    findAll()
 * @method Convoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConvoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Convoyage::class);
    }

    // /**
    //  * @return Convoyage[] Returns an array of Convoyage objects
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
    public function findOneBySomeField($value): ?Convoyage
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
