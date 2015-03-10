<?php

namespace TheCommons\CommonFolkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionRequired
 */
class ActionRequired
{
    /**
     * @var integer
     */
    private $personId;

    /**
     * @var integer
     */
    private $actionId;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set personId
     *
     * @param integer $personId
     * @return ActionRequired
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    
        return $this;
    }

    /**
     * Get personId
     *
     * @return integer 
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Set actionId
     *
     * @param integer $actionId
     * @return ActionRequired
     */
    public function setActionId($actionId)
    {
        $this->actionId = $actionId;
    
        return $this;
    }

    /**
     * Get actionId
     *
     * @return integer 
     */
    public function getActionId()
    {
        return $this->actionId;
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
}