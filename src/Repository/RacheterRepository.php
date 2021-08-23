<?php

namespace App\Repository;

use App\Entity\Racheter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Racheter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Racheter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Racheter[]    findAll()
 * @method Racheter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RacheterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Racheter::class);
    }

    // /**
    //  * @return Racheter[] Returns an array of Racheter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Racheter
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
