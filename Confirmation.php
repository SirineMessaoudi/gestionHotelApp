<?php


namespace HotelBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;

/**
 * @ORM\Entity
 * @ORM\Table(name="confirmations",
uniqueConstraints={
@ORM\UniqueConstraint(name="Cient_Reservation_unique", columns={"id", "id"})
}
)
 */
class Confirmation
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $confirmation;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;


    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="Confirmation")
     */
    protected $clients;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class)
     */
    protected $reservations;

    public function __toString()
    {
        $conf = "Confirmation (Id: %s, %s, %s)\n";
        return sprintf($conf, $this->id, $this->clients, $this->reservations);
    }



}