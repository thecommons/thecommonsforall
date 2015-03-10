<?php

namespace TheCommons\CommonFolkBundle\Menu;

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
                'route' => 'the_commons_common_folk',
                'routeParameters' =>
                    array(
                        'page' => 'home'
                    )
            )
        );


        // short circuit here if not logged in at all.
        // anything below here WILL NOT be visible to anon visitors
        if (!$this->authorizationCheckerInterface->isGranted('ROLE_USER')) {
            return $menu;
        }

        $menu->addChild('attendance',
            array(
                'route' => 'the_commons_common_folk',
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
                'route' => 'the_commons_common_folk',
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
                'route' => 'the_commons_common_folk',
                'routeParameters' =>
                    array(
                        'page' => 'add',
                        'subpage' => 'communitygroup'
                    )
            )
        );


        // protected links!
        if ($this->authorizationCheckerInterface->isGranted('ROLE_ADMIN')) {
            $menu->addChild('admin');
            $menu['admin']->addChild('users',
                array('route' => 'the_commons_security_admin',
                    'routeParameters' =>
                        array(
                            'page' => 'users'
                        )
                )
            );
        }

        return $menu;
    }
}
