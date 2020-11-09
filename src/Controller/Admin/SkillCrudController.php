<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name', 'isActive'])
            ->setEntityLabelInSingular('compétence')
            ->setEntityLabelInPlural('compétences')
            ->setPageTitle(crud::PAGE_INDEX, 'Liste des %entity_label_plural%')
            ->setDefaultSort(['name' => 'ASC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('isActive');
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('name', 'Nom');
        $icon = ImageField::new('icon', 'Icône')
            ->setBasePath($this->getParameter('app.path.skill_icon'));
        $iconFile = ImageField::new('iconFile', 'Icône')
            ->setRequired(true)
            ->setFormType(VichImageType::class);
        $isActive = BooleanField::new('isActive', 'Actif ?');

        $result = [$icon, $name, $isActive];

        if ($pageName === Crud::PAGE_EDIT || $pageName === Crud::PAGE_NEW) {
            $result = [$name, $iconFile, $isActive];
        }

        return $result;
    }
}
