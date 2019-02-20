<?php

namespace MissionBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use MissionBundle\Entity\Categorie;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('duree')->add('hebergement',ChoiceType::class ,array(
            'choices'=> array(
                'Oui'=>'Oui',
                'Non'=>'Non',

            )
        ))
            ->add('prix')->add('transport',ChoiceType::class ,array(
                'choices'=> array(
                    'Oui'=>'Oui',
                    'Non'=>'Non',

                )
            ))
            ->add('nom')->add('nombrepersonne')


        ->add('categorie',EntityType::class,array(
        'class'=>'MissionBundle\Entity\Categorie',
        'choice_label'=>'nom',
        'multiple'=>false
                ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MissionBundle\Entity\Mission'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'missionbundle_mission';
    }


}
