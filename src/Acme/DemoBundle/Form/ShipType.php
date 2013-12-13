<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ShipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'text', array(
                    'disabled' => true
                )
            )
            ->add('shipName', 'text')
        ;
    }

    public function getName()
    {
        return 'ship';
    }
}
