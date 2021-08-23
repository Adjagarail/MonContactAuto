<?php

namespace App\Repository;

use App\Entity\Typevehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typevehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typevehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typevehicule[]    findAll()
 * @method Typevehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypevehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typevehicule::class);
    }

    // /**
    //  * @return Typevehicule[] Returns an array of Typevehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typevehicule
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
