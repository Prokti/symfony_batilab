<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{

    public function __toString()
    {
        return $this->getSociete();
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ContactType")
     * @ORM\JoinColumn(nullable=true)
     */
    private $contact_type;

    public function getContactType()
    {
        return $this->contact_type;
    }

    public function setContactType(ContactType $contact_type)
    {
        $this->contact_type = $contact_type;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $societe;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $telephone_portable;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $telephone_bureau;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Lot", cascade={"persist"}, inversedBy= "contacts")
     */
    private $lots;


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
     * @return mixed
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * @param mixed $societe
     */
    public function setSociete($societe): void
    {
        $this->societe = $societe;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


    /**
     * @return ArrayCollection
     */
    public function getLots()
    {
        return $this->lots;
    }

    /**
     * @param mixed $lots
     */
    public function setLots($lots): void
    {
        $this->lots = $lots;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getTelephonePortable()
    {
        return $this->telephone_portable;
    }

    /**
     * @param mixed $telephone_portable
     */
    public function setTelephonePortable($telephone_portable): void
    {
        $this->telephone_portable = $telephone_portable;
    }

    /**
     * @return mixed
     */
    public function getTelephoneBureau()
    {
        return $this->telephone_bureau;
    }

    /**
     * @param mixed $telephone_bureau
     */
    public function setTelephoneBureau($telephone_bureau): void
    {
        $this->telephone_bureau = $telephone_bureau;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }



    public function getNomPrenom()
    {
        $result =  $this->getPrenom() . " " . $this->getNom();

        return $result;
    }


}
