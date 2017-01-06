<?php

namespace Louvre\BilletterieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paiement',        ChoiceType::class, array(
                'choices' =>array('Paypal'=>'1', 'Carte Bancaire'=>'2'), 'expanded' => true))
            ->add('email', TextType::class)
            ->add('Etapesuivante',   SubmitType::class, array('label'=>'Etape suivante >'))
            ->add('Etapeprec',       SubmitType::class, array('label'=>'< Etape précédente'))
            ->add('Annuler',         SubmitType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\BilletterieBundle\Model\CommandeModel'
        ));
    }
}
