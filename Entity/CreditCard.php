<?php


namespace HotelBundle\Entity;
use Doctrine\ORM\Mapping as ORM ;
    /**
     * @ORM\Entity
     */
    class CreditCard
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
    private $codeCvc;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $codePerson;

    /**
     * @ORM\Column(type="string",length=255)
     */
        // pour ajouter le  client dans la creditcard :
        /**
         * @ORM\OneToOne(targetEntity=Client::class)
         */
    private $cardPerson;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $cardNumber;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $typeCard;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $dateExpiration;

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
        public function getCodeCvc()
        {
            return $this->codeCvc;
        }

        /**
         * @param mixed $codeCvc
         */
        public function setCodeCvc($codeCvc)
        {
            $this->codeCvc = $codeCvc;
        }

        /**
         * @return mixed
         */
        public function getCodePerson()
        {
            return $this->codePerson;
        }

        /**
         * @param mixed $codePerson
         */
        public function setCodePerson($codePerson)
        {
            $this->codePerson = $codePerson;
        }

        /**
         * @return mixed
         */
        public function getCardPerson()
        {
            return $this->cardPerson;
        }

        /**
         * @param mixed $cardPerson
         */
        public function setCardPerson($cardPerson)
        {
            $this->cardPerson = $cardPerson;
        }

        /**
         * @return mixed
         */
        public function getCardNumber()
        {
            return $this->cardNumber;
        }

        /**
         * @param mixed $cardNumber
         */
        public function setCardNumber($cardNumber)
        {
            $this->cardNumber = $cardNumber;
        }

        /**
         * @return mixed
         */
        public function getTypeCard()
        {
            return $this->typeCard;
        }

        /**
         * @param mixed $typeCard
         */
        public function setTypeCard($typeCard)
        {
            $this->typeCard = $typeCard;
        }

        /**
         * @return mixed
         */
        public function getDateExpiration()
        {
            return $this->dateExpiration;
        }

        /**
         * @param mixed $dateExpiration
         */
        public function setDateExpiration($dateExpiration)
        {
            $this->dateExpiration = $dateExpiration;
        }


}
