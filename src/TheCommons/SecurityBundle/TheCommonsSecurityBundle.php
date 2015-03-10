<?php

namespace TheCommons\SecurityBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TheCommonsSecurityBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
