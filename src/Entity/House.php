<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $price_ht;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $long_ext;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", cascade={"persist"})
     */
    private $categories;

    private $price_ttc;

    /**
     * @return mixed
     */
    public function getPriceTtc()
    {
        $total = $this->price_ht * 1.20 ;
        return ($total);
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





}
