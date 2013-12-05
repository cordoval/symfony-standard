<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class OptionNumberType extends OptionType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('choices_entry', 'choice', array(
            'label' => ' ',
        ));
    }

    public function getName()
    {
        return 'option_number';
    }
}
