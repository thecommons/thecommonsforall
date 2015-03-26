<?php

namespace TheCommons\SermonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SermonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('time')
            ->add('audio')
            ->add('description')
            ->add('series')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TheCommons\SermonBundle\Entity\Sermon'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'thecommons_sermonbundle_sermon';
    }
}
