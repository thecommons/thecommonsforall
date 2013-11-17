<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository
{

  // get all the people that a associated with each role
  public function findAllPeople()
  {
    return $this->createQueryBuilder('r')
      ->getResult();
  }
}

?>
