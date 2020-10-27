<?php

namespace App\Controller\Admin;

use App\Entity\ProjectImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjectImage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name', 'project.name'])
            ->setEntityLabelInSingular('image')
            ->setEntityLabelInPlural('images')
            ->setPageTitle(crud::PAGE_INDEX, 'Liste des %entity_label_plural%')
            ->setDefaultSort(['project' => 'DESC', 'isCover' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('project')
            ->add('isCover');
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name', 'Nom');
        $image = ImageField::new('image', 'Image')
            ->setBasePath($this->getParameter('app.path.project_image'));
        $imageFile = ImageField::new('imageFile', 'Image')
            ->setRequired(true)
            ->setFormType(VichImageType::class);
        $isCover = BooleanField::new('isCover', 'Image principal')
            ->renderAsSwitch(false);
        $project = AssociationField::new('project', 'Projet')->setRequired(true);

        $result = [$name, $image, $project, $isCover];

        if ($pageName === Crud::PAGE_NEW) {
            $result = [$name, $imageFile, $project, $isCover];
        }

        if ($pageName === Crud::PAGE_EDIT) {
            $result = [$name, $project, $isCover];
        }

        if ($pageName === Crud::PAGE_DETAIL) {
            $result = [$id, $name, $image, $project, $isCover];
        }

        return $result;
    }
}
