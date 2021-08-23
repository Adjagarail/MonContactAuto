<?php

namespace App\Repository;

use App\Entity\Conexpertise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conexpertise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conexpertise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conexpertise[]    findAll()
 * @method Conexpertise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConexpertiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conexpertise::class);
    }

    // /**
    //  * @return Conexpertise[] Returns an array of Conexpertise objects
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
    public function findOneBySomeField($value): ?Conexpertise
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
