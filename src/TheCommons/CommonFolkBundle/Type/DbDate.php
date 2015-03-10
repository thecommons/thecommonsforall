<?php

namespace TheCommons\CommonFolkBundle\Type;

class DbDate extends \DateTime
{

    /**
     * Return Date in ISO8601 format
     *
     * @return String
     */
    public function __toString() {
        return $this->format('Y-m-d');
    }
}