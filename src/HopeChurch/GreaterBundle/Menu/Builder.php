<?php

namespace HopeChurch\GreaterBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class Builder
{
    private $factory;
    protected $authorizationCheckerInterface;

    /**
     * @param FactoryInterface $factory
     * * @param AuthorizationCheckerInterface $authorizationCheckerInterface
     */
    public function __construct(FactoryInterface $factory,
                                AuthorizationCheckerInterface $authorizationCheckerInterface)
    {
        $this->factory = $factory;
        $this->authorizationCheckerInterface = $authorizationCheckerInterface;
    }

    public function topNavMenu()
    {
        $menu = $this->factory->createItem('root');

        // to check for authorized roles:
        // $this->authorizationCheckerInterface->isGranted('ROLE_USER')

        $menu->addChild('home',
            array(
                'route' => 'hope_church_greater',
                'routeParameters' =>
                    array(
                        'page' => 'home'
                    )
            )
        );

        $menu->addChild('attendance',
            array(
                'route' => 'hope_church_greater',
                'routeParameters' =>
                    array(
                        'page' => 'attendance'
                    )
            )
        );

        $menu->addChild('people');
        $menu['people']->addChild('browse', array('route' => 'person'));
        $menu['people']->addChild('add', array('route' => 'person_new'));
        //$menu['people']->addChild('edit', array('route' => 'person_edit'));

        /** Everything below here is crap and needs fixing **/
        $menu->addChild('families');
        $menu['families']->addChild('add',
            array(
                'route' => 'hope_church_greater',
                'routeParameters' =>
                    array(
                        'page' => 'add',
                        'subpage' => 'family'
                    )
            )
        );

        $menu->addChild('community groups');
        $menu['community groups']->addChild('add',
            array(
                'route' => 'hope_church_greater',
                'routeParameters' =>
                    array(
                        'page' => 'add',
                        'subpage' => 'communitygroup'
                    )
            )
        );

        return $menu;
    }
}
