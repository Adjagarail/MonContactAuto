<?php

namespace App\Repository;

use App\Entity\Voituress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Voituress|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voituress|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voituress[]    findAll()
 * @method Voituress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoituressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voituress::class);
    }

    // /**
    //  * @return Voituress[] Returns an array of Voituress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Voituress
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
