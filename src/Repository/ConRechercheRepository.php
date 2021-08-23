<?php

namespace App\Repository;

use App\Entity\ConRecherche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConRecherche|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConRecherche|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConRecherche[]    findAll()
 * @method ConRecherche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConRechercheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConRecherche::class);
    }

    // /**
    //  * @return ConRecherche[] Returns an array of ConRecherche objects
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
    public function findOneBySomeField($value): ?ConRecherche
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
