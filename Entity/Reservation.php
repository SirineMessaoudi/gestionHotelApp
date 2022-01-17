<?php


namespace HotelBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;
/**
 * @ORM\Entity
 * @ORM\Table(name="Reservation")
 */
class Reservation
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;


    private $codeReservation;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $dateReservation;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $dateArrive;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $dateDepart;
    /**
     * @ORM\Column(type="string",length=255)
     */

//pour ajouter le reservation_id dans le client :
    /**
     * @ORM\OneToOne(targetEntity=Client::class)
     */
    private $client ;

// pour ajouter la  chambre dans la réservation :
    /**
     * @ORM\OneToOne(targetEntity=Chambre::class)
     */
    private $chambre;

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

    /**
     * @return mixed
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * @param mixed $dateReservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;
    }

    /**
     * @return mixed
     */
    public function getDateArrive()
    {
        return $this->dateArrive;
    }

    /**
     * @param mixed $dateArrive
     */
    public function setDateArrive($dateArrive)
    {
        $this->dateArrive = $dateArrive;
    }

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * @param mixed $dateDepart
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getChambre()
    {
        return $this->chambre;
    }

    /**
     * @param mixed $chambre
     */
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;
    }



}
