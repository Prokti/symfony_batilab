<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HouseRepository")
 */
class House
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="HouseProduct", mappedBy="house")
     */
    private $products;


    public function __construct() {
        $this->products = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products): void
    {
        $this->products = $products;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private $price_ht;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $long_ext;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $larg_ext;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface_hab;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface_annexe;

    /**
    * @ORM\Column(type="integer", nullable=true)
    */
    private $nbr_chambre;

    /**
 * @ORM\Column(type="integer", nullable=true)
 */
    private $nbr_sdb;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", cascade={"persist"})
     */
    private $categories;

    public function __toString()
    {
        return $this->getName();
    }



    /**
     * @return mixed
     */
    public function getPriceTtc()
    {
        $total = $this->price_ht * 1.20 ;
        return $total;
    }



    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPriceHt()
    {
        return $this->price_ht;
    }

    /**
     * @param mixed $price_ht
     */
    public function setPriceHt($price_ht): void
    {
        $this->price_ht = $price_ht;
    }

    /**
     * @return mixed
     */
    public function getLongExt()
    {
        return $this->long_ext;
    }

    /**
     * @param mixed $long_ext
     */
    public function setLongExt($long_ext): void
    {
        $this->long_ext = $long_ext;
    }

    /**
     * @return mixed
     */
    public function getLargExt()
    {
        return $this->larg_ext;
    }

    /**
     * @param mixed $larg_ext
     */
    public function setLargExt($larg_ext): void
    {
        $this->larg_ext = $larg_ext;
    }

    /**
     * @return mixed
     */
    public function getSurfaceHab()
    {
        return $this->surface_hab;
    }

    /**
     * @param mixed $surface_hab
     */
    public function setSurfaceHab($surface_hab): void
    {
        $this->surface_hab = $surface_hab;
    }

    /**
     * @return mixed
     */
    public function getSurfaceAnnexe()
    {
        return $this->surface_annexe;
    }

    /**
     * @param mixed $surface_annexe
     */
    public function setSurfaceAnnexe($surface_annexe): void
    {
        $this->surface_annexe = $surface_annexe;
    }

    /**
     * @return mixed
     */
    public function getNbrChambre()
    {
        return $this->nbr_chambre;
    }

    /**
     * @param mixed $nbr_chambre
     */
    public function setNbrChambre($nbr_chambre): void
    {
        $this->nbr_chambre = $nbr_chambre;
    }

    /**
     * @return mixed
     */
    public function getNbrSdb()
    {
        return $this->nbr_sdb;
    }

    /**
     * @param mixed $nbr_sdb
     */
    public function setNbrSdb($nbr_sdb): void
    {
        $this->nbr_sdb = $nbr_sdb;
    }





}
