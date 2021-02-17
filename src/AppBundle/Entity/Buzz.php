<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Buzz
 *
 * @ORM\Table(name="buzz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuzzRepository")
 */
class Buzz
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
     * @var Fizz
     *
     * @ORM\ManyToOne(targetEntity="Fizz")
     * @ORM\JoinColumn(name="fizz_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $fizz;

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
     * @return Buzz
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
     * Set fizz.
     *
     * @param \AppBundle\Entity\Fizz|null $fizz
     *
     * @return Buzz
     */
    public function setFizz(\AppBundle\Entity\Fizz $fizz = null)
    {
        $this->fizz = $fizz;

        return $this;
    }

    /**
     * Get fizz.
     *
     * @return \AppBundle\Entity\Fizz|null
     */
    public function getFizz()
    {
        return $this->fizz;
    }
}
