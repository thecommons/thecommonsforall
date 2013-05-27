<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
  public function findAllLeaders()
  {
    // TODO make this sort based on the number of people that have this person 
    // set as their leader
    return $this->getEntityManager()
	        ->createQuery("SELECT p.id, p.nameFirst, p.nameLast "
			     ." FROM HopeChurchGreaterBundle:Person p "
			     ." ORDER BY p.nameFirst, p.nameLast ASC")
	        ->getResult();
  }
}

?>
