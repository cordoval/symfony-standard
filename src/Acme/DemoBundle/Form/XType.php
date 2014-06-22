<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class XType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateBirth', null, array(
                    'format' => 'dd-MM-yyyy',
                    'years' => range(1900, (date("Y") - 17))
                )
            )
            ->add('submit', 'submit')
        ;
    }

    public function getName()
    {
        return 'X';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\X',
        ));
    }
}
