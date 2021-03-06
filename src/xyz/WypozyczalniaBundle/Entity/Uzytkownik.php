<?php
namespace xyz\WypozyczalniaBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Uzytkownik extends BaseUser {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Zamowienie", mappedBy="uzytkownik")
     */
    private $zamowienia;

    /**
     * @ORM\OneToMany(targetEntity="Recenzja", mappedBy="uzytkownik")
     */
    private $recenzje;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->zamowienia = new \Doctrine\Common\Collections\ArrayCollection();
        $this->recenzje = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add zamowienia
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Zamowienie $zamowienia
     * @return Uzytkownik
     */
    public function addZamowienium(\xyz\WypozyczalniaBundle\Entity\Zamowienie $zamowienia)
    {
        $this->zamowienia[] = $zamowienia;

        return $this;
    }

    /**
     * Remove zamowienia
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Zamowienie $zamowienia
     */
    public function removeZamowienium(\xyz\WypozyczalniaBundle\Entity\Zamowienie $zamowienia)
    {
        $this->zamowienia->removeElement($zamowienia);
    }

    /**
     * Get zamowienia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZamowienia()
    {
        return $this->zamowienia;
    }

    /**
     * Add recenzje
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Recenzja $recenzje
     * @return Uzytkownik
     */
    public function addRecenzje(\xyz\WypozyczalniaBundle\Entity\Recenzja $recenzje)
    {
        $this->recenzje[] = $recenzje;

        return $this;
    }

    /**
     * Remove recenzje
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Recenzja $recenzje
     */
    public function removeRecenzje(\xyz\WypozyczalniaBundle\Entity\Recenzja $recenzje)
    {
        $this->recenzje->removeElement($recenzje);
    }

    /**
     * Get recenzje
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecenzje()
    {
        return $this->recenzje;
    }
}
