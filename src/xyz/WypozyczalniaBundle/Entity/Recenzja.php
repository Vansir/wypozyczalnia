<?php

namespace xyz\WypozyczalniaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recenzja
 *
 * @ORM\Table(name="recenzja")
 * @ORM\Entity
 */
class Recenzja
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
     * @ORM\Column(name="tekst", type="text")
     */
    private $tekst;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Uzytkownik", inversedBy="recenzje")
     */
    private $uzytkownik;

    /**
     * @ORM\ManyToOne(targetEntity="Film", inversedBy="recenzje")
     */
    private $film;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_utworzenia", type="datetime")
     */
    private $dataUtworzenia;



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
     * Set tekst
     *
     * @param string $tekst
     * @return Recenzja
     */
    public function setTekst($tekst)
    {
        $this->tekst = $tekst;

        return $this;
    }

    /**
     * Get tekst
     *
     * @return string 
     */
    public function getTekst()
    {
        return $this->tekst;
    }

    /**
     * Set dataUtworzenia
     *
     * @param \DateTime $dataUtworzenia
     * @return Recenzja
     */
    public function setDataUtworzenia($dataUtworzenia)
    {
        $this->dataUtworzenia = $dataUtworzenia;

        return $this;
    }

    /**
     * Get dataUtworzenia
     *
     * @return \DateTime 
     */
    public function getDataUtworzenia()
    {
        return $this->dataUtworzenia;
    }

    /**
     * Set uzytkownik
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Uzytkownik $uzytkownik
     * @return Recenzja
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

    /**
     * Set film
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Film $film
     * @return Recenzja
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
}
