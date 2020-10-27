<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Helper\EasyAdmin\ChangeRedirectWhenEdit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class EditEmailController extends AbstractCrudController
{
    use ChangeRedirectWhenEdit;

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier l\'email');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE);
    }


    public function configureFields(string $pageName): iterable
    {
        $email = EmailField::new('email');

        return [$email];
    }
}
