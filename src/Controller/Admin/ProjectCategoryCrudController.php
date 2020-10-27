<?php

namespace App\Controller\Admin;

use App\Entity\ProjectCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjectCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name', 'title'])
            ->setEntityLabelInSingular('catégorie de projet')
            ->setEntityLabelInPlural('catégories de projet')
            ->setPageTitle(crud::PAGE_INDEX, 'Liste des %entity_label_plural%');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name', 'Nom');
        $title = TextField::new('title', 'Titre')
            ->setHelp('Titre affiché sur la page «projets» pour différencier les projets.');

        $result = [$name, $title];

        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            $result = [$name, $title];
        }

        return $result;
    }
}
