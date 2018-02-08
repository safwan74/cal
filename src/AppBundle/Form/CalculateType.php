<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CalculateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num1', NumberType::class)
            ->add('num2', NumberType::class)
            ->add('op', ChoiceType::class, array(
                 'choices'  => array(
                 'Add' => '+',
                 'Take away' => '-',
                 'Divide' => '/',
                 'Multiply' => '*'   
    ),
))    
            ->add('submit', SubmitType::class)
        ;
    }
}