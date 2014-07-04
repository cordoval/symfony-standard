<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emails', 'collection', array(
                'type' => 'email',
                'prototype' => true,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'participant';
    }
}
