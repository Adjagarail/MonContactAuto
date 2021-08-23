<?php


namespace App\Data;

use App\Entity\Marques;
use App\Entity\Typevehicule;

class SearchData
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
  public $min;

    /**
     * @var null|integer
     */
  public $max;

    /**
     * @var null|integer
     */
  public $minYears;

    /**
     * @var null|integer
     */
  public $maxYears;

}