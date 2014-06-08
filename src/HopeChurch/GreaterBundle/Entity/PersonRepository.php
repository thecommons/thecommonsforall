<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
  public function findAllOrdered()
    {
      return $this->findBy(array(), array('nameLast' => 'ASC', 'nameFirst' => 'ASC'));
    }
}

?>
