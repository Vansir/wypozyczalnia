<?php
namespace xyz\WypozyczalniaBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Zamowienie
 *
 * @ORM\Table(name="zamowienie")
 * @ORM\Entity
 */
class Zamowienie
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
     *
     * @ORM\ManyToOne(targetEntity="Film", inversedBy="zamowienia")
     */
    private $film;


    /**
     * @ORM\ManyToOne(targetEntity="Uzytkownik", inversedBy="zamowienia")
     */
    private $uzytkownik;


    /**
     * @ORM\Column(name="cena", type="decimal")
     */
    private $cena;


    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;


 

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
     * Set cena
     *
     * @param string $cena
     * @return Zamowienie
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
     * Set status
     *
     * @param string $status
     * @return Zamowienie
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set film
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Film $film
     * @return Zamowienie
     */
    public function setFilm(\xyz\WypozyczalniaBundle\Entity\Film $film = null)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \xyz\WypozyczalniaBundle\Entity\Film 
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set uzytkownik
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Uzytkownik $uzytkownik
     * @return Zamowienie
     */
    public function setUzytkownik(\xyz\WypozyczalniaBundle\Entity\Uzytkownik $uzytkownik = null)
    {
        $this->uzytkownik = $uzytkownik;

        return $this;
    }

    /**
     * Get uzytkownik
     *
     * @return \xyz\WypozyczalniaBundle\Entity\Uzytkownik 
     */
    public function getUzytkownik()
    {
        return $this->uzytkownik;
    }
}
