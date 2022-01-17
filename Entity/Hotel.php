<?php

namespace HotelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM ;
/**
 * @ORM\Entity
 */
class Hotel
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $region;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $adresse;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $ville;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $codePostal;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $pays;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $tel;
    /**
     * @ORM\Column(type="string",length=255)
     */

    /*
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="description" ,cascade={"persist","remove"} )
     */
    private $commentaires ;
    public function _construct3()
    {
        $this->commentaires =new ArrayCollection();
    }
    private $description;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nbreEtoiles;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $etat;
    /**
     * @ORM\Column(type="string",length=255)
     */


    /*
     * @ORM\OneToMany(targetEntity="Hotelier",mappedBy="hoteliers" ,cascade={"persist","remove"} )
     */
    private $hoteliers ;
    public function _construct()
    {
        $this->hoteliers =new ArrayCollection();
    }


    /*
    * @ORM\OneToMany(targetEntity="Chambre",mappedBy="hotel" ,cascade=("persist") )
    */
    private $chambres ;
    public function _construct2()
    {
        $this->chambres =new ArrayCollection();
    }



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
    public function setId($id)
    {
        $this->id = $id;
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
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getNbreEtoiles()
    {
        return $this->nbreEtoiles;
    }

    /**
     * @param mixed $nbreEtoiles
     */
    public function setNbreEtoiles($nbreEtoiles)
    {
        $this->nbreEtoiles = $nbreEtoiles;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /*
        * @ORM\OneToOne(targetEntity="Administrateur",cascade={"persist","remove"} )
        */
    private $reservation;

}
