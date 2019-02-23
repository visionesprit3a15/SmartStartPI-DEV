<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 13/02/2019
 * Time: 01:03
 */

namespace MyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('telephone');
        $builder->add('adresse');
        $builder->add('specialite');
        $builder->add('diplome');
        $builder->add('niveauEtude');
    }
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    public function  getBlockPrefix()
    {
       return 'app_user_registration';
    }
    public function  getName()
    {
        return $this->getBlockPrefix();
    }

}