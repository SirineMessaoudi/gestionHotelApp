<?php


namespace HotelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM ;



/**
 * @ORM\Entity
 * @ORM\Table(name="chambre")
 */
class Chambre
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
    private $prix;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $disponibilite;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $typeChambre;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nombreDeLit;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $numChambre;


    /**
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumn(name="hotel_id",referencedColumnName="id")
     */
    private $idHotel;


// pour ajouter la réservation dans la chambre :
    /**
     * @ORM\OneToOne(targetEntity=Reservation::class)
     */
    private $codeReservation ;

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
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * @param mixed $disponibilite
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;
    }

    /**
     * @return mixed
     */
    public function getTypeChambre()
    {
        return $this->typeChambre;
    }

    /**
     * @param mixed $typeChambre
     */
    public function setTypeChambre($typeChambre)
    {
        $this->typeChambre = $typeChambre;
    }

    /**
     * @return mixed
     */
    public function getNombreDeLit()
    {
        return $this->nombreDeLit;
    }

    /**
     * @param mixed $nombreDeLit
     */
    public function setNombreDeLit($nombreDeLit)
    {
        $this->nombreDeLit = $nombreDeLit;
    }

    /**
     * @return mixed
     */
    public function getNumChambre()
    {
        return $this->numChambre;
    }

    /**
     * @param mixed $numChambre
     */
    public function setNumChambre($numChambre)
    {
        $this->numChambre = $numChambre;
    }

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * @param mixed $idHotel
     */
    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;
    }

    /**
     * @return mixed
     */
    public function getCodeReservation()
    {
        return $this->codeReservation;
    }

    /**
     * @param mixed $codeReservation
     */
    public function setCodeReservation($codeReservation)
    {
        $this->codeReservation = $codeReservation;
    }





}
