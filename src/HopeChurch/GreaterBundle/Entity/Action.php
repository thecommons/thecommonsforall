<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 */
class Action
{
    /**
     * @var string
     */
    private $actionName;

    /**
     * @var string
     */
    private $priority;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set actionName
     *
     * @param string $actionName
     * @return Action
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
    
        return $this;
    }

    /**
     * Get actionName
     *
     * @return string 
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * Set priority
     *
     * @param string $priority
     * @return Action
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    
        return $this;
    }

    /**
     * Get priority
     *
     * @return string 
     */
    public function getPriority()
    {
        return $this->priority;
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