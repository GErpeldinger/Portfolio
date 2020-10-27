<?php

namespace App\Controller\Admin;

use App\Entity\TagCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TagCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TagCategory::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name'])
            ->setEntityLabelInSingular('catégorie de tag')
            ->setEntityLabelInPlural('catégories de tag')
            ->setPageTitle(crud::PAGE_INDEX, 'Liste des %entity_label_plural%')
            ->setDefaultSort(['name' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name', 'Nom');

        $result = [$name];

        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            $result = [$name];
        }

        return $result;
    }
}
