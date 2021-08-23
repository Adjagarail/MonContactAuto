<?php

namespace App\Repository;

use App\Entity\Vvente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vvente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vvente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vvente[]    findAll()
 * @method Vvente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VventeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vvente::class);
    }

    // /**
    //  * @return Vvente[] Returns an array of Vvente objects
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
    public function findOneBySomeField($value): ?Vvente
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
