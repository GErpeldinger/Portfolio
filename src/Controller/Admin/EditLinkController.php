<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use App\Helper\EasyAdmin\ChangeRedirectWhenEdit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EditLinkController extends AbstractCrudController
{
    use ChangeRedirectWhenEdit;


    public static function getEntityFqcn(): string
    {
        return Link::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier le lien');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE);
    }


    public function configureFields(string $pageName): iterable
    {
        $url = TextField::new('url', 'Nouvelle url');

        return [$url];
    }
}
