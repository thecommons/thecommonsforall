<?php

namespace TheCommons\CommonFolkBundle\Entity;

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
     * @var ArrayCollection
     */
    private $discipleshipStages;

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
     * @param \TheCommons\CommonFolkBundle\Entity\Person $person
     * @return Smallgroup
     */
    public function addPerson(\TheCommons\CommonFolkBundle\Entity\Person $person)
    {
      $this->people->addElement($person);

      return $this;
    }

    /**
     * Remove person
     *
     * @param \TheCommons\CommonFolkBundle\Entity\Person $person
     */
    public function removePerson(\TheCommons\CommonFolkBundle\Entity\Person $person)
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

    /**
     * Add discipleshipStage
     *
     * @param \TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $discipleshipStage
     * @return Smallgroup
     */
    public function addDiscipleshipStage(\TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $discipleshipStage)
    {
      $this->discipleshipStages->addElement($discipleshipStage);

      return $this;
    }

    /**
     * Remove discipleshipStage
     *
     * @param \TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $discipleshipStage
     */
    public function removeDiscipleshipStage(\TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $discipleshipStage)
    {
      $this->discipleshipStages->removeElement($discipleshipStage);
    }

    /**
     * Get discipleshipStages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiscipleshipStages()
    {
      return $this->discipleshipStages;
    }
}