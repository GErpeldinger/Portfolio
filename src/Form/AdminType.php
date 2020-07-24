<?php

namespace App\Form;

use App\Entity\Admin;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{
    public const INFORMATION = 'information';
    public const PASSWORD = 'password';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($options['action'] === self::INFORMATION) {
            $this->informations($builder);
        }

        if ($options['action'] === self::PASSWORD) {
            $this->password($builder);
        }
    }

    public function informations(FormBuilderInterface $builder): FormBuilderInterface
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('surname', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('forename', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('birthday', BirthdayType::class, [
                'label' => 'Date de naissance'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville'
            ])
            ->add('job', TextType::class, [
                'label' => 'Métier'
            ])
            ->add('linkedIn', UrlType::class, [
                'label' => 'LinkedIn'
            ])
            ->add('github', UrlType::class, [
                'label' => 'Github'
            ])
            ->add('resume', CKEditorType::class, [
                'label' => 'Informations Résumé'
            ])
            ->add('overview', CKEditorType::class, [
                'label' => 'Compétences Résumé'
            ])
        ;

        return $builder;
    }

    public function password(FormBuilderInterface $builder): FormBuilderInterface
    {
        $builder->add('password', PasswordType::class, [
            'label' => 'Mot de passe'
        ]);

        return $builder;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Admin::class,
            'action' => ''
        ]);
    }
}
