<?php

namespace HopeChurch\GreaterBundle\Type;

use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class DbDateType extends DateType
{
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $date = parent::convertToPHPValue($value, $platform);

        if (!$date) {
	  return null;
        }

        return new DbDate($date->format('Y-m-d'));
    }

    public function getName()
    {
        return 'dbdate';
    }
}