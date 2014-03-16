<?php

namespace HopeChurch\GreaterBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{

  public function findAllForIndex()
  {
    return $this->createQueryBuilder('p')
      ->select('p.id, p.nameFirst, p.nameLast, p.email, p.phoneCell, ds.name as dstage')
      ->leftJoin('p.discipleshipStage', 'ds')
      ->addOrderBy('p.nameLast', 'ASC')
      ->addOrderBy('p.nameFirst', 'ASC')
      ->getQuery()->getResult();
  }

}

?>
