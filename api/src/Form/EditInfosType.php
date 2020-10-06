<?php

namespace App\Form;

use App\Entity\Infos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditInfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surname', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('forename', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('birthday', DateType::class, [
                'label' => 'Date de naissance',
                'label_attr' => ['class' => 'text-nowrap'],
                'widget' => 'choice',
                'years' => range(date('Y')-60, date('Y')-18),
                'months' => range(1, 12),
                'days' => range(1, 31),
            ])
            ->add('job', TextType::class, [
                'label' => 'Métier',
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Infos::class,
        ]);
    }
}
