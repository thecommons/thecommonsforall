<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 */
class Role
{
    /**
     * @var string
     */
    private $roleName;

    /**
     * @var ArrayCollection
     */
    private $people;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set roleName
     *
     * @param string $roleName
     * @return Role
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * Get roleName
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->roleName;
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
     * Add person
     *
     * @param \HopeChurch\GreaterBundle\Entity\Person $person
     * @return Smallgroup
     */
    public function addPerson(\HopeChurch\GreaterBundle\Entity\Person $person)
    {
      $this->people->addElement($person);

      return $this;
    }

    /**
     * Remove person
     *
     * @param \HopeChurch\GreaterBundle\Entity\Person $person
     */
    public function removePerson(\HopeChurch\GreaterBundle\Entity\Person $person)
    {
      $this->people->removeElement($person);
    }

    /**
     * Get people
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeople()
    {
      return $this->people;
    }
}