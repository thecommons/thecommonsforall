<?php

namespace HopeChurch\GreaterBundle\Form\Type;

use HopeChurch\GreaterBundle\Entity\PersonRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddPersonType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('nameFirst', 'text', array(
                                             'label' => 'First Name'
                                             ));

    $builder->add('nameLast', 'text', array(
                                            'label' => 'Last Name',
                                            'required' => false
                                            ));

    $builder->add('howHeard', 'text', array(
                                             'label' => 'How?',
                                             'required' => false
                                             ));

    $builder->add('notes', 'textarea', array(
                                             'label' => 'Notes',
                                             'required' => false
                                             ));

    $builder->add('roles', 'entity', array(
					   'label' => 'Roles',
					   'required' => true,
					   'class' =>
					   'HopeChurchGreaterBundle:Role',
					   'property'     => 'roleName',
					   'multiple'     => true,
					   'expanded'     => true
					   ));

    $builder->add('email', 'email', array(
                                          'label' => 'Email',
                                          'required' => false
                                          ));

    $builder->add('phoneCell', 'text', array(
                                             'label' => 'Cell Phone',
                                             'required' => false
                                             ));

    $builder->add('phoneHome', 'text', array(
                                             'label' => 'Home Phone',
                                             'required' => false
                                             ));

    $builder->add('addrFirst', 'text', array(
                                             'label' => 'Address',
                                             'required' => false
                                             ));

    $builder->add('addrSecond', 'text', array(
                                              'label' => ' ',
                                              'required' => false
                                              ));

    $builder->add('addrCity', 'text', array(
                                            'label' => 'City',
                                            'required' => false
                                            ));

    $builder->add('addrState', 'text', array(
                                             'label' => 'State/Province/Region',
                                             'required' => false
                                             ));

    $builder->add('addrZip', 'text', array(
                                           'label' => 'Zip/Postal Code',
                                           'required' => false
                                           ));

    $builder->add('addrCountry', 'text', array(
                                               'label' => 'Country',
                                               'required' => false
                                               ));

    $builder->add('facebook', 'checkbox', array(
                                                'label' => 'Facebook?',
                                                'required' => false
                                                ));

    $builder->add('leader',
                  'entity',
                  array(
                        'label' => 'Leader',
                        'empty_value' => '-- None --',
                        'class' => 'HopeChurchGreaterBundle:Person',
                        'query_builder' =>
                        function(PersonRepository $pr)
                        {
			  return $pr->findByRoleName('Leader')
			    ->orderBy('p.nameFirst, p.nameLast', 'ASC');
			},
                        'required' => false
			)
		  );
  }

  public function getName()
  {
    return 'person';
  }
}

?>