<?php

namespace App\Repository;

use App\Entity\Demenagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Demenagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demenagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demenagement[]    findAll()
 * @method Demenagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemenagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demenagement::class);
    }

    // /**
    //  * @return Demenagement[] Returns an array of Demenagement objects
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
    public function findOneBySomeField($value): ?Demenagement
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
