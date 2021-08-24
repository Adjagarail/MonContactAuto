<?php


namespace App\Data;


use App\Entity\Typevehicule;

class LocationData
{
    /**
     * @var null/datetime
     */
    public $dispoAt;

    /**
     * @var int
     */
    public $page = 1;
    /**
     * @var Typevehicule[]
     */
    public $typevehicule;

    /**
     * @var null/datetime
     */
    public $disposAt;

    /**
     * @var array
     */
    public $ville = [];

    /**
     * @var null/string
     */
    public $autreville;

    /**
     * @var null/int
     */
    public $mincarburant;

    /**
     * @var null/int
     */
    public $maxcarburant;
    /**
     * @var null/int
     */
    public $maxprix;
    /**
     * @var null/int
     */
    public $minprix;
    /**
     * @var null/int
     */
    public $maxtarif;
    /**
     * @var null/int
     */
    public $mintarif;
    /**
     * @var null/int
     */
    public $maxtarifs;
    /**
     * @var null/int
     */
    public $mintarifs;







}