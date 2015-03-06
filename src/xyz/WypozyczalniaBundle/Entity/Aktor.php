<?php

namespace xyz\WypozyczalniaBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Aktor
 *
 * @ORM\Table(name="aktor")
 * @ORM\Entity()
 */
class Aktor
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
     * @ORM\Column(name="aktor", type="string", length=255)
     */
    private $aktor;


    /**
    * @ORM\ManyToMany(targetEntity="Film", mappedBy="aktorzy")
    */
    private $filmy;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filmy = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set aktor
     *
     * @param string $aktor
     * @return Aktor
     */
    public function setAktor($aktor)
    {
        $this->aktor = $aktor;

        return $this;
    }

    /**
     * Get aktor
     *
     * @return string 
     */
    public function getAktor()
    {
        return $this->aktor;
    }

    /**
     * Add filmy
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Film $filmy
     * @return Aktor
     */
    public function addFilmy(\xyz\WypozyczalniaBundle\Entity\Film $filmy)
    {
        $this->filmy[] = $filmy;

        return $this;
    }

    /**
     * Remove filmy
     *
     * @param \xyz\WypozyczalniaBundle\Entity\Film $filmy
     */
    public function removeFilmy(\xyz\WypozyczalniaBundle\Entity\Film $filmy)
    {
        $this->filmy->removeElement($filmy);
    }

    /**
     * Get filmy
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilmy()
    {
        return $this->filmy;
    }
}
