<?php


namespace App\Data;


use App\Entity\Marques;
use App\Entity\Typevehicule;

class VoitureData
{
    /**
     * @var int
     */
    public $page = 1;
    /**
     * @var Typevehicule[]
     */
    public $typevehicule;

    /**
     * @var Marques[]
     */
    public $marques;

    /**
     * @var null|string
     */
    public $destiner;

    /**
     * @var null|integer
     */
    public $years;

    /**
     * @var null|integer
     */
    public $minPrice;
    /**
     * @var null|integer
     */
    public $maxPrice;

    /**
     * @var null|string
     */
    public $carburant;

    /**
     * @var null|string
     */
    public $transmission;



}