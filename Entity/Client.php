<?php


namespace HotelBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM ;
/**
 * @ORM\Entity
 */
class Client
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
    private $prenom;
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
    private $email;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $password;


    public function _construct()
    {
        $this->reservations =new ArrayCollection();
    }
    /*
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="id" ,cascade=("persist") )
     */
    private $comementaires ;
    public function _construct2()
    {
        $this->comementaires =new ArrayCollection();
    }

//pour ajouter le client_id dans la reservation :
    /**
     * @ORM\OneToOne(targetEntity=Reservation::class)
     */
    private $codeReservation ;
    /**
     * @ORM\OneToMany(targetEntity=Confirmation::class, mappedBy="Client")
     */
    protected $confirmations;

    public function _construct3()
    {
        $this->confirmations = new ArrayCollection();
    }

    // pour ajouter le numCard dans la client :
    /**
     * @ORM\OneToOne(targetEntity=CreditCard::class)
     */
    private $card ;

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getComementaires()
    {
        return $this->comementaires;
    }

    /**
     * @param mixed $comementaires
     */
    public function setComementaires($comementaires)
    {
        $this->comementaires = $comementaires;
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
    public function getConfirmations()
    {
        return $this->confirmations;
    }

    /**
     * @param mixed $confirmations
     */
    public function setConfirmations($confirmations)
    {
        $this->confirmations = $confirmations;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param mixed $card
     */
    public function setCard($card)
    {
        $this->card = $card;
    }

}
