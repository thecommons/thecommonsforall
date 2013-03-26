<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonRole
 */
class PersonRole
{
    /**
     * @var integer
     */
    private $personId;

    /**
     * @var integer
     */
    private $roleId;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set personId
     *
     * @param integer $personId
     * @return PersonRole
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
     * Set roleId
     *
     * @param integer $roleId
     * @return PersonRole
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    
        return $this;
    }

    /**
     * Get roleId
     *
     * @return integer 
     */
    public function getRoleId()
    {
        return $this->roleId;
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
