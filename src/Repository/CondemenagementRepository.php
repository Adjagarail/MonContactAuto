<?php

namespace App\Repository;

use App\Entity\Condemenagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Condemenagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Condemenagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Condemenagement[]    findAll()
 * @method Condemenagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CondemenagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Condemenagement::class);
    }

    // /**
    //  * @return Condemenagement[] Returns an array of Condemenagement objects
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
    public function findOneBySomeField($value): ?Condemenagement
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
