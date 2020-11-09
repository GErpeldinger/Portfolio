<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Link;
use App\Entity\Project;
use App\Entity\ProjectCategory;
use App\Entity\ProjectImage;
use App\Entity\Tag;
use App\Entity\TagCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<strong>Portfolio</strong>')
            ->setFaviconPath('/build/images/favicon/android-icon-192x192.png');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        /** @var Admin $admin */
        $admin = $this->getUser();

        return parent::configureUserMenu($user)
            ->setName('Erpeldinger Guillaume')
            ->setAvatarUrl('/build/images/favicon/apple-icon-60x60.png')
            ->setMenuItems([
                MenuItem::linkToCrud('Modifier email', 'fas fa-at', Admin::class)
                    ->setController(EditEmailController::class)
                    ->setEntityId($admin->getId())
                    ->setAction(Action::EDIT),
                MenuItem::linkToCrud('Modifier password', 'fas fa-key', Admin::class)
                    ->setController(EditPasswordController::class)
                    ->setEntityId($admin->getId())
                    ->setAction(Action::EDIT),
                MenuItem::linkToLogout('Déconnexion', 'a fa-sign-out')
            ]);
    }

    public function configureActions(): Actions
    {
        return Actions::new()
            ->add(Crud::PAGE_INDEX, Action::NEW)
            ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $action) => $action->setIcon('fas fa-plus'))
            ->add(Crud::PAGE_INDEX, Action::EDIT)
            ->update(Crud::PAGE_INDEX, Action::EDIT, fn(Action $action) => $action->setIcon('fas fa-edit')->setLabel(false))
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DETAIL, fn(Action $action) => $action->setIcon('fas fa-eye')->setLabel(false))
            ->add(Crud::PAGE_INDEX, Action::DELETE)
            ->update(Crud::PAGE_INDEX, Action::DELETE, fn(Action $action) => $action->setIcon('fas fa-trash-alt')->setLabel(false))
            ->add(Crud::PAGE_DETAIL, Action::EDIT)
            ->update(Crud::PAGE_DETAIL, Action::EDIT, fn(Action $action) => $action->setIcon('fas fa-edit'))
            ->add(Crud::PAGE_DETAIL, Action::INDEX)
            ->update(Crud::PAGE_DETAIL, Action::INDEX, fn(Action $action) => $action->setIcon('fas fa-undo-alt'))
            ->add(Crud::PAGE_DETAIL, Action::DELETE)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN)
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, fn(Action $action) => $action->setIcon('fas fa-save'))
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
            ->add(Crud::PAGE_NEW, Action::SAVE_AND_RETURN)
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, fn(Action $action) => $action->setIcon('fas fa-save'))
            ->add(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, fn(Action $action) => $action->setIcon('fas fa-plus'));
    }

    public function configureMenuItems(): iterable
    {
        $linkRepository = $this->getDoctrine()->getManager()->getRepository(Link::class);

        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Api documentation', 'fa fa-toolbox', 'api_doc');

        yield MenuItem::section('Projets');
        yield MenuItem::linkToCrud('Projet catégories', 'fas fa-archive', ProjectCategory::class);
        yield MenuItem::linkToCrud('Liste des projets', 'fas fa-project-diagram', Project::class);
        yield MenuItem::linkToCrud('Liste des images', 'fas fa-images', ProjectImage::class);
        yield MenuItem::linkToCrud('Tag catégories', 'fas fa-inbox', TagCategory::class);
        yield MenuItem::linkToCrud('Liste des tags', 'fas fa-tags', Tag::class);

        yield MenuItem::section('Autres');
        yield MenuItem::subMenu('Liens', 'fas fa-link')
            ->setSubItems([
                MenuItem::linkToCrud('Email', 'fas fa-envelope', Link::class)
                    ->setController(EditLinkController::class)
                    ->setEntityId($linkRepository->findOneBy(['name' => Link::CONTACT['name']])->getId())
                    ->setAction(Action::EDIT),
                MenuItem::linkToCrud('LinkedIn', 'fab fa-linkedin', Link::class)
                    ->setController(EditLinkController::class)
                    ->setEntityId($linkRepository->findOneBy(['name' => Link::LINKEDIN['name']])->getId())
                    ->setAction(Action::EDIT),
                MenuItem::linkToCrud('GitHub', 'fab fa-github', Link::class)
                    ->setController(EditLinkController::class)
                    ->setEntityId($linkRepository->findOneBy(['name' => Link::GITHUB['name']])->getId())
                    ->setAction(Action::EDIT)
            ]);


        yield MenuItem::section('Site');
        yield MenuItem::linktoRoute('Accueil', 'fa fa-home', 'index', ['reactRouting' => '']);
        yield MenuItem::linktoRoute('Projets', 'fas fa-eye', 'index', ['reactRouting' => 'projets']);
    }
}
