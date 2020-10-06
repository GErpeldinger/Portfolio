<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TimelineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Timeline::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['sequence' => 'ASC'])
            ->setEntityLabelInSingular('évènement')
            ->setEntityLabelInPlural('évènements')
            ->setPageTitle(Crud::PAGE_INDEX,'Modifier la timeline')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier l\'%entity_label_singular%');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        $result = [];

        $order = IntegerField::new('sequence', 'Ordre');
        $title = TextField::new('title', 'Titre');
        $startDate = DateField::new('startDate', 'Date de début');
        $endDate = DateField::new('endDate', 'Date de fin');
        $noDay = BooleanField::new('noDay', 'Pas de jour');
        $noMonth = BooleanField::new('noMonth', 'Pas de mois');
        $description = TextareaField::new('description', 'Description');
        $icon = TextField::new('icon', 'Icône');

        if ($pageName === Crud::PAGE_INDEX) {
            $result = [$order, $title, $startDate, $endDate];
        }

        if ($pageName === Crud::PAGE_EDIT) {
            $result = [$order, $title, $icon, $startDate, $endDate, $noDay, $noMonth, $description];
        }

        if ($pageName === Crud::PAGE_DETAIL) {
            $result = [$order, $title, $icon, $startDate, $endDate, $noDay, $noMonth, $description];
        }

        return $result;
    }
}
