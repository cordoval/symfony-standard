<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('favoriteColors', 'collection')
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'user';
    }
}
