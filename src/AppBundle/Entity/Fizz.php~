<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fizz
 *
 * @ORM\Table(name="fizz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FizzRepository")
 */
class Fizz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Buzz", mappedBy="fizz")
     */
    private $buzzs;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Fizz
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->buzzs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add buzz.
     *
     * @param \AppBundle\Entity\Buzz $buzz
     *
     * @return Fizz
     */
    public function addBuzz(\AppBundle\Entity\Buzz $buzz)
    {
        $this->buzzs[] = $buzz;

        return $this;
    }

    /**
     * Remove buzz.
     *
     * @param \AppBundle\Entity\Buzz $buzz
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeBuzz(\AppBundle\Entity\Buzz $buzz)
    {
        return $this->buzzs->removeElement($buzz);
    }

    /**
     * Get buzzs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBuzzs()
    {
        return $this->buzzs;
    }
}
