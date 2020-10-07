<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $result = [];

        $name = TextField::new('name', 'Nom');
        $icon = ImageField::new('icon', 'Icône')
            ->setBasePath(
                $this->getParameter('app.path.skill_icon')
            );
        $iconFile = ImageField::new('iconFile', 'Icône')
            ->setFormType(VichImageType::class);

        if (Crud::PAGE_INDEX === $pageName) {
            $result = [$name, $icon];
        }

        if (Crud::PAGE_EDIT === $pageName) {
            $result = [$name, $iconFile];
        }

        if (Crud::PAGE_NEW === $pageName) {
            $result = [$name, $iconFile];
        }

        return $result;
    }
}
