<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $result = [];

        $name = TextField::new('name', 'Nom');
        $description = TextField::new('description', 'Description');
        $cover = ImageField::new('cover', 'Image de couverture')
            ->setBasePath(
                $this->getParameter('app.path.project_cover')
            );
        $coverFile = ImageField::new('coverFile', 'Image de couverture')
            ->setFormType(VichImageType::class);

        if (Crud::PAGE_INDEX === $pageName) {
            $result = [$name, $description, $cover];
        }

        if (Crud::PAGE_EDIT === $pageName) {
            $result = [$name, $description, $coverFile];
        }

        if (Crud::PAGE_NEW === $pageName) {
            $result = [$name, $description, $coverFile];
        }

        return $result;
    }
}
