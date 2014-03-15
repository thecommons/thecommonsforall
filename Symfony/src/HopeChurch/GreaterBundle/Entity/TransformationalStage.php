<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransformationalStage
 */
class TransformationalStage
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
   * @var TransformationalStage
   */
  private $nextStage;

  /**
   * @var TransformationalStage
   */
  private $prevStage;

  /**
   * @var ArrayCollection
   */
  private $mentorRoles;

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
   * @return TransformationalStage
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
   * @param \HopeChurch\GreaterBundle\Entity\TransformationalStage $nextStage
   * @return Person
   */
  public function setNextStage(\HopeChurch\GreaterBundle\Entity\TransformationalStage $nextStage = null)
  {
    $this->nextStage = $nextStage;

    return $this;
  }

  /**
   * Get nextStage
   *
   * @return \HopeChurch\GreaterBundle\Entity\TransformationalStage
   */
  public function getNextStage()
  {
    return $this->nextStage;
  }

  /**
   * Set prevStage
   *
   * @param \HopeChurch\GreaterBundle\Entity\TransformationalStage $prevStage
   * @return Person
   */
  public function setPrevStage(\HopeChurch\GreaterBundle\Entity\TransformationalStage $prevStage = null)
  {
    $this->prevStage = $prevStage;

    return $this;
  }

  /**
   * Get prevStage
   *
   * @return \HopeChurch\GreaterBundle\Entity\TransformationalStage
   */
  public function getPrevStage()
  {
    return $this->prevStage;
  }

  /**
   * Add mentorRole
   *
   * @param \HopeChurch\GreaterBundle\Entity\Role $mentorRole
   * @return Smallgroup
   */
  public function addMentorRole(\HopeChurch\GreaterBundle\Entity\Role $mentorRole)
  {
    $this->mentorRoles->addElement($mentorRole);

    return $this;
  }

  /**
   * Remove mentorRole
   *
   * @param \HopeChurch\GreaterBundle\Entity\Role $mentorRole
   */
  public function removeMentorRole(\HopeChurch\GreaterBundle\Entity\Role $mentorRole)
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
