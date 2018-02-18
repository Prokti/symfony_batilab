<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Class Category
 * @ApiResource()
 * @ORM\Entity
 * @ORM\Table (name="category")
 */

class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


    /**
 * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="category")
 */

    private $products;


    public function __toString()
    {
        return $this->getName();
    }
    /**
     * @return Collection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
    /**
     *
     * @param Product[] $products
     */
    public function setProducts($products)
    {
        $this->products = new ArrayCollection($products);
    }



}