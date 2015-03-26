<?php

namespace TheCommons\SermonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SermonSeriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('startDate')
            ->add('backgroundImg')
            ->add('foregroundImg')
            ->add('description')
            ->add('videoURL')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TheCommons\SermonBundle\Entity\SermonSeries'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'thecommons_sermonbundle_sermonseries';
    }
}
