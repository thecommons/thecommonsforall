<?php

namespace TheCommons\CommonFolkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscipleshipStage
 */
class DiscipleshipStage
{
  /**
   * @var integer
   */
  private $id;

  /**
   * @var string
   */
  private $name;

  /**
   * @var DiscipleshipStage
   */
  private $nextStage;

  /**
   * @var DiscipleshipStage
   */
  private $prevStage;

  /**
   * @var ArrayCollection
   */
  private $mentorRoles;

  public function __toString()
  {
    return $this->getName();
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
   * Set name
   *
   * @param string $name
   * @return DiscipleshipStage
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set nextStage
   *
   * @param \TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $nextStage
   * @return Person
   */
  public function setNextStage(\TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $nextStage = null)
  {
    $this->nextStage = $nextStage;

    return $this;
  }

  /**
   * Get nextStage
   *
   * @return \TheCommons\CommonFolkBundle\Entity\DiscipleshipStage
   */
  public function getNextStage()
  {
    return $this->nextStage;
  }

  /**
   * Set prevStage
   *
   * @param \TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $prevStage
   * @return Person
   */
  public function setPrevStage(\TheCommons\CommonFolkBundle\Entity\DiscipleshipStage $prevStage = null)
  {
    $this->prevStage = $prevStage;

    return $this;
  }

  /**
   * Get prevStage
   *
   * @return \TheCommons\CommonFolkBundle\Entity\DiscipleshipStage
   */
  public function getPrevStage()
  {
    return $this->prevStage;
  }

  /**
   * Add mentorRole
   *
   * @param \TheCommons\CommonFolkBundle\Entity\Role $mentorRole
   * @return Smallgroup
   */
  public function addMentorRole(\TheCommons\CommonFolkBundle\Entity\Role $mentorRole)
  {
    $this->mentorRoles->addElement($mentorRole);

    return $this;
  }

  /**
   * Remove mentorRole
   *
   * @param \TheCommons\CommonFolkBundle\Entity\Role $mentorRole
   */
  public function removeMentorRole(\TheCommons\CommonFolkBundle\Entity\Role $mentorRole)
  {
    $this->mentorRoles->removeElement($mentorRole);
  }

  /**
   * Get mentorRoles
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getMentorRoles()
  {
    return $this->mentorRoles;
  }
}
