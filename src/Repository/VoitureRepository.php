<?php

namespace App\Repository;

use App\Data\LocationData;
use App\Data\SearchData;
use App\Data\VoitureData;
use App\Entity\Voiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Voiture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voiture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voiture[]    findAll()
 * @method Voiture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Voiture::class);
        $this->paginator = $paginator;
    }

    // /**
    //  * @return Voiture[] Returns an array of Voiture objects
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
    public function findOneBySomeField($value): ?Voiture
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function lastcarSearch(){

        $resultLast = $this->createQueryBuilder('p');

        $resultLast
            ->select('p')
            ->orderBy('p.dateAt', 'DESC')
            ->andWhere('p.destiner = :q')
            ->setParameter('q','vente')
            ->setMaxResults(3)
        ;

        return $resultLast->getQuery()->getResult();
    }
    public function lastSearch(){

        $resultLast = $this->createQueryBuilder('p');

        $resultLast
            ->select('p')
            ->orderBy('p.dateAt', 'DESC')
            ->andWhere('p.destiner = :q')
            ->setParameter('q','location')
            ->setMaxResults(3)
        ;

        return $resultLast->getQuery()->getResult();
    }



    /**
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function findSearch(SearchData $searchData): \Knp\Component\Pager\Pagination\PaginationInterface
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('c','p','s')
            ->join('p.marques','c')
            ->join('p.typevehicule','s')
            ->andWhere('p.destiner = :q')
            ->setParameter('q','vente')
            ->andWhere('p.disponible = :w')
            ->setParameter('w','disponible')
        ;
        if(!empty($searchData->q)){
            $query = $query
                ->andWhere('p.description LIKE :q')
                ->setParameter('q',"%{$searchData->q}%");
        }
        if(!empty($searchData->min)){
            $query = $query
                ->andWhere('p.kilometrages >= :min')
                ->setParameter('min',$searchData->min);
        }
        if(!empty($searchData->max)){
            $query = $query
                ->andWhere('p.kilometrages <= :max')
                ->setParameter('max',$searchData->max);
        }
        if(!empty($searchData->minYears)){
            $query = $query
                ->andWhere('p.years >= :minYears')
                ->setParameter('minYears',$searchData->minYears);
        }
        if(!empty($searchData->maxYears)){
            $query = $query
                ->andWhere('p.years <= :maxYears')
                ->setParameter('maxYears',$searchData->maxYears);
        }
        if(!empty($searchData->marques)){
            $query = $query
                ->andWhere('c.id IN (:marques)')
                ->setParameter('marques',$searchData->marques);
        }
        if(!empty($searchData->typevehicule)){
            $query = $query
                ->andWhere('s.id IN (:typevehicule)')
                ->setParameter('typevehicule',$searchData->typevehicule);
        }


        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $searchData->page,
            2
        );
    }
    /**
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function findTest(LocationData $locationData): \Knp\Component\Pager\Pagination\PaginationInterface
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('c','p','s')
            ->join('p.marques','c')
            ->join('p.typevehicule','s')
            ->andWhere('p.destiner = :q')
            ->setParameter('q','location')
            ->andWhere('p.disponible = :w')
            ->setParameter('w','disponible')

        ;
        if(!empty($locationData->dispoAt && $locationData->disposAt)){

            $query = $query
                    ->andWhere('p.dispoAt BETWEEN :dispoAt AND :disposAt')
                    ->setParameter('dispoAt', $locationData->dispoAt)
                    ->setParameter('disposAt', $locationData->disposAt);

        }
        if(!empty($locationData->typevehicule)){
            $query = $query
                ->andWhere('s.id IN (:typevehicule)')
                ->setParameter('typevehicule',$locationData->typevehicule);
        }
        if(!empty($locationData->ville)){
            $query = $query
                ->andWhere('p.villeL LIKE :ville')
                ->setParameter('ville',"%{$locationData->ville}%");
        }
        if(!empty($locationData->autreville)){
            $query = $query
                ->andWhere('p.villeL LIKE :ville')
                ->setParameter('ville',"%{$locationData->autreville}%");
        }
        if(!empty($locationData->mincarburant)){
            $query = $query
                ->andWhere('p.carburant >= :mincarburant')
                ->setParameter('mincarburant',$locationData->mincarburant);
        }
        if(!empty($locationData->maxcarburant)){
            $query = $query
                ->andWhere('p.carburant <= :maxcarburant')
                ->setParameter('maxcarburant',$locationData->maxcarburant);
        }
        if(!empty($locationData->mintarif)){
            $query = $query
                ->andWhere('p.tarif >= :mintarif')
                ->setParameter('mintarif',$locationData->mintarif);
        }
        if(!empty($locationData->maxtarif)){
            $query = $query
                ->andWhere('p.tarif <= :maxtarif')
                ->setParameter('maxtarif',$locationData->maxtarif);
        }
        if(!empty($locationData->mintarifs)){
            $query = $query
                ->andWhere('p.tarifs >= :mintarifs')
                ->setParameter('mintarifs',$locationData->mintarifs);
        }
        if(!empty($locationData->maxtarifs)){
            $query = $query
                ->andWhere('p.tarifs <= :maxtarifs')
                ->setParameter('maxtarifs',$locationData->maxtarifs);
        }
        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            1,
            1
        );
    }

    /**
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function findCar(VoitureData $locationData): \Knp\Component\Pager\Pagination\PaginationInterface
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('c','p','s')
            ->innerJoin('p.marques','c')
            ->innerJoin('p.typevehicule','s')
        ;

        if(!empty($locationData->destiner)){
            $query = $query
                ->andWhere('p.destiner LIKE :destiner')
                ->setParameter('destiner',"%{$locationData->destiner}%");
        }
        if(!empty($locationData->typevehicule)){
            $query = $query
                ->andWhere('s.id IN (:typevehicule)')
                ->setParameter('typevehicule',$locationData->typevehicule);
        }


         if(!empty($locationData->marques)){
            $query = $query
                ->andWhere('c.id IN (:marques)')
                ->setParameter('marques',$locationData->marques);
        }
        if(!empty($locationData->years)){
            $query = $query
                ->andWhere('p.years = :minYears')
                ->setParameter('minYears',$locationData->years);
        }
        if(!empty($locationData->transmission)) {
            $query = $query
                ->andWhere('p.transmission LIKE :transmission')
                ->setParameter('transmission',"%{$locationData->transmission}%");
        }
        if(!empty($locationData->carburant)) {
            $query = $query
                ->andWhere('p.carburant LIKE :carburant')
                ->setParameter('carburant',"%{$locationData->carburant}%");
        }


        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $locationData->page,
            12
        );
    }
}
