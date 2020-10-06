<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class LinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Link::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('lien')
            ->setEntityLabelInPlural('liens')
            ->setPageTitle(Crud::PAGE_INDEX,'Modifier les %entity_label_plural%')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier le %entity_label_singular%');
    }

    public function configureFields(string $pageName): iterable
    {
        $result = [];

        $name = TextField::new('name', 'Nom');
        $url = UrlField::new('url', 'Url');

        if (Crud::PAGE_INDEX === $pageName) {
            $result = [$name, $url];
        }

        if (Crud::PAGE_EDIT === $pageName) {
            $result = [$url];
        }

        return $result;
    }
}
