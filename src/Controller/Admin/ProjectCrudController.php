<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name', 'category.name'])
            ->setEntityLabelInSingular('projet')
            ->setEntityLabelInPlural('projets')
            ->setPageTitle(crud::PAGE_INDEX, 'Liste des %entity_label_plural%')
            ->setDefaultSort(['category' => 'ASC', 'startDate' => 'ASC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add('category');
    }

    public function configureFields(string $pageName): iterable
    {
        $infoPanel = FormField::addPanel('Informations', 'fas fa-info-circle');
        $id = IdField::new('id');
        $name = TextField::new('name', 'Nom');
        $slug = SlugField::new('slug')
            ->setTargetFieldName('name');
        $description = TextareaField::new('description', 'Description')
            ->setFormType(CKEditorType::class);
        $category = AssociationField::new('category', 'Catégorie')
            ->setRequired(true);
        $startDate = DateField::new('startDate', 'Date de début');
        $imagesNumber = AssociationField::new('projectImages', 'Images');
        $images = ArrayField::new('projectImages', 'Images');
        $tags = AssociationField::new('tags', 'Tags')
            ->setRequired(true);
        $tagsShow = CollectionField::new('tags', 'Tags');

        $linkPanel = FormField::addPanel('Liens', 'fas fa-link');
        $link = UrlField::new('link', 'Lien vers le site');
        $github = UrlField::new('github', 'GitHub');
        $video = UrlField::new('video', 'Vidéo');

        $result = [$name, $category, $imagesNumber, $tags, $startDate];

        if ($pageName === Crud::PAGE_DETAIL) {
            $result = [$infoPanel, $id, $name, $slug, $description, $category, $startDate, $images, $tagsShow, $linkPanel, $link, $github, $video];
        }

        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            $result = [$infoPanel, $name, $slug, $description, $category, $tags, $startDate, $linkPanel, $link, $github, $video];
        }

        return $result;
    }
}
