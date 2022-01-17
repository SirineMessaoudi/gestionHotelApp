<?php


namespace HotelBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;


    /**
     * @ORM\Entity
     */
class Commentaire
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

    private $texte;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $email;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $date;
    /**
     * @ORM\Column(type="string",length=255)
     */

    /**
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumn(name="hotel_id",referencedColumnName="id")
     */
    private $description ;


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
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }



}
