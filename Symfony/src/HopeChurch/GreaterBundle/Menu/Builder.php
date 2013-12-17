<?php

namespace HopeChurch\GreaterBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class Builder
{
  private $factory;

  /**
   * @param FactoryInterface $factory
   */
  public function __construct(FactoryInterface $factory)
  {
    $this->factory = $factory;
  }

  public function topNavMenu()
  {
    $menu = $this->factory->createItem('root');

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

    $menu->addChild('add');
    $menu['add']->addChild('person',
				array(
				      'route' => 'hope_church_greater_add_person'
				      )
				);

    $menu['add']->addChild('family',
				array(
				      'route' => 'hope_church_greater',
				      'routeParameters' =>
				      array(
					    'page' => 'add',
					    'subpage' => 'family'
					    )
				      )
				);

    $menu['add']->addChild('communitygroup',
				array(
				      'route' => 'hope_church_greater',
				      'routeParameters' =>
				      array(
					    'page' => 'add',
					    'subpage' => 'communitygroup'
					    )
				      )
				);

    $menu->addChild('view');
    $menu['view']->addChild('people',
				array(
				      'route' => 'hope_church_greater',
				      'routeParameters' =>
				      array(
					    'page' => 'view',
					    'subpage' => 'people'
					    )
				      )
				);

    $menu['view']->addChild('families',
				array(
				      'route' => 'hope_church_greater',
				      'routeParameters' =>
				      array(
					    'page' => 'view',
					    'subpage' => 'families'
					    )
				      )
				);

    $menu['view']->addChild('communitygroups',
				array(
				      'route' => 'hope_church_greater',
				      'routeParameters' =>
				      array(
					    'page' => 'view',
					    'subpage' => 'communitygroups'
					    )
				      )
				);

    return $menu;
  }
}