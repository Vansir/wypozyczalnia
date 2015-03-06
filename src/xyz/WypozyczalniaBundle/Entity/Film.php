<?php

namespace xyz\WypozyczalniaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity()
 */
class Film
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tytul", type="string", length=255)
     */
    private $tytul;

    /**
     * @var text
     *
     * @ORM\Column(name="opis", type="text", nullable=true)
     */
    private $opis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rok_premiery", type="date")
     */
    private $rokPremiery;

    /**
     * @var string
     *
     * @ORM\Column(name="okladka", type="string", length=255)
     */
    private $okladka;

    /**
    *  @ORM\ManyToMany(targetEntity="Aktor", inversedBy="filmy")
    *  @ORM\JoinTable(name="film_aktor")
    */
    private $aktorzy;

    /**
     * @ORM\OneToMany(targetEntity="Zamowienie", mappedBy="film")
     */
    private $zamowienia;

    /**
     * @ORM\OneToMany(targetEntity="Recenzja", mappedBy="film")
     */
    private $recenzje;
    
    /**
     * @ORM\Column(name="cena", type="decimal")
     */
    private $cena;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aktorzy = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tytul
     *
     * @param string $tytul
     * @return Film
     */
    public function setTytul($tytul)
    {
        $this->tytul = $tytul;

        return $this;
    }

    /**
     * Get tytul
     *
     * @return string 
     */
    public function getTytul()
    {
        return $this->tytul;
    }

    /**
     * Set opis
     *
     * @param string $opis
     * @return Film
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string 
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set rokPremiery
     *
     * @param \DateTime $rokPremiery
     * @return Film
     */
    public function setRokPremiery($rokPremiery)
    {
        $this->rokPremiery = $rokPremiery;

        return $this;
    }

    /**
     * Get rokPremiery
     *
     * @return \DateTime 
     */
    public function getRokPremiery()
    {
        return $this->rokPremiery;
    }

    /**
     * Set okladka
     *
     * @param string $okladka
     * @return Film
     */
    public function setOkladka($okladka)
    {
        $this->okladka = $okladka;

        return $this;
    }

    /**
     * Get okladka
     *
     * @return string 
     */
    public function getOkladka()
    {
        return $this->okladka;
    }

    /**
     * Set cena
     *
     * @param string $cena
     * @return Film
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return string 
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Add aktorzy
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Aktor $aktorzy
     * @return Film
     */
    public function addAktorzy(\xyz\WypozyczalniaBundle\Entity\Aktor $aktorzy)
    {
        $this->aktorzy[] = $aktorzy;

        return $this;
    }

    /**
     * Remove aktorzy
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Aktor $aktorzy
     */
    public function removeAktorzy(\xyz\WypozyczalniaBundle\Entity\Aktor $aktorzy)
    {
        $this->aktorzy->removeElement($aktorzy);
    }

    /**
     * Get aktorzy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAktorzy()
    {
        return $this->aktorzy;
    }

    /**
     * Add zamowienia
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Zamowienie $zamowienia
     * @return Film
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
     * @return Film
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
