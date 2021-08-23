<?php

namespace App\Repository;

use App\Entity\Voiturel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Voiturel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voiturel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voiturel[]    findAll()
 * @method Voiturel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoiturelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voiturel::class);
    }

    // /**
    //  * @return Voiturel[] Returns an array of Voiturel objects
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
    public function findOneBySomeField($value): ?Voiturel
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
