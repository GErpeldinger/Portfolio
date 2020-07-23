<?php

namespace App\Form;

use App\Entity\Timeline;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimelineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [

            ])
            ->add('startDate', DateType::class, [

            ])
            ->add('endDate', DateType::class, [
                'required' => false
            ])
            ->add('noDay', CheckboxType::class, [
                'required' => false
            ])
            ->add('noMonth', CheckboxType::class, [
                'required' => false
            ])
            ->add('description', CKEditorType::class, [

            ])
            ->add('label', TextType::class, [

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Timeline::class,
        ]);
    }
}
