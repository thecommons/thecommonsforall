<?php

namespace HopeChurch\GreaterBundle\Form;

use HopeChurch\GreaterBundle\Entity\Person;
use HopeChurch\GreaterBundle\Entity\PersonRepository;
use HopeChurch\GreaterBundle\Entity\DiscipleshipStage;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType
{
  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {

    $builder->add('nameFirst', 'text', array(
					     'label' => 'First Name'
					     ));

    $builder->add('nameLast', 'text', array(
					    'label' => 'Last Name',
					    'required' => false
					    ));

    $builder->add('referrer', 'entity', array(
					      'label' => 'Referrer',
					      'required' => false,
					      'empty_value' => '-- Unknown --',
					      'class' =>
					      'HopeChurchGreaterBundle:Referrer',
					      'property'    => 'name'
					      ));

    $builder->add('notes', 'textarea', array(
					     'label' => 'Notes',
					     'required' => false
					     ));

    $builder->add('age', 'entity', array(
					 'label' => 'Age',
					 'required' => true,
					 'empty_value' => '-- Select Age Group --',
					 'class' => 'HopeChurchGreaterBundle:Age',
					 'property' => 'fullName'
					 ));

    $builder->add('status', 'entity', array(
					    'label' => 'Status',
					    'required' => true,
					    'class' => 'HopeChurchGreaterBundle:PersonStatus',
					    'property' => 'name'
					    ));

    $builder->add('roles', 'entity', array(
					   'label' => 'Roles',
					   'required' => false,
					   'empty_value' => '-- None --',
					   'class' =>
					   'HopeChurchGreaterBundle:Role',
					   'property'     => 'roleName',
					   'multiple'     => true,
					   'expanded'     => false
					   ));

    $builder->add('baptized', 'checkbox', array(
						'label' => 'Baptized',
						'required' => false
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
						'label' => 'Facebook',
						'required' => false
						));

    $builder->add('discipleshipStage', 'entity',
		  array(
			'label' => 'Discipleship Stage',
			'required' => true,
			'class' => 'HopeChurchGreaterBundle:DiscipleshipStage',
			'property' => 'name'
			));

    $factory = $builder->getFormFactory();
    $refreshMentor = function ($form, $dstage) use ($factory) {
      $form->add($factory->
		 createNamed('mentor', 'entity', null,
			     array(
				   'class' => 'HopeChurchGreaterBundle:Person',
				   'empty_value'   => '-- Select Mentor --',
				   'required'      => true,
				   'label'         => 'Mentor',
				   'auto_initialize' => false,
				   'query_builder' =>
				   function (EntityRepository $repository) use ($dstage) {
				     $qb = $repository
				       ->createQueryBuilder('p')
				       ->innerJoin('p.roles', 'proles')
				       ->innerJoin('proles.discipleshipStages',
						   'pts');

				     if($dstage instanceof DiscipleshipStage) {
				       $qb = $qb
					 ->where('pts = :dstage')
					 ->setParameter('dstage', $dstage);
				     } elseif(is_numeric($dstage)) {
				       $qb = $qb
					 ->where('pts.id = :dstage_id')
					 ->setParameter('dstage_id', $dstage);
				     } else {
				       $qb = $qb->where('pts.id = 1'); //nothing
				     }

				     return $qb;
				   }
				   )
			     )
		 );
    };

    $builder->addEventListener(FormEvents::PRE_SET_DATA,
			       function (FormEvent $event) use ($refreshMentor) {
				 $form = $event->getForm();
				 $data = $event->getData();

				 if($data == null) {
				   //As of beta2, when a form is created
				   //setData(null) is called first
				   $refreshMentor($form, null);
				 } else if($data instanceof Person) {
				   $refreshMentor($form,
						  $data->getDiscipleshipStage());
				 } else {
				   var_dump($data);
				 }
			       });

    $builder->addEventListener(FormEvents::PRE_SUBMIT,
			       function (FormEvent $event) use ($refreshMentor) {
				 $form = $event->getForm();
				 $data = $event->getData();

				 if(array_key_exists('discipleshipStage', $data)) {
				   $refreshMentor($form, $data['discipleshipStage']);
				 }
			       });
  }

  /**
   * @param OptionsResolverInterface $resolver
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
				 'data_class' => 'HopeChurch\GreaterBundle\Entity\Person'
				 ));
  }

  /**
   * @return string
   */
  public function getName()
  {
    return 'hopechurch_greaterbundle_person';
  }
}
