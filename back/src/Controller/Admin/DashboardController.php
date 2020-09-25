<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Infos;
use App\Entity\Link;
use App\Entity\Timeline;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
            ->setTitle('Portfolio Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Modifier email', 'fas fa-at', Admin::class)
            ->setController(EditEmailController::class);
        yield MenuItem::linkToCrud('Modifier password', 'fas fa-key', Admin::class)
            ->setController(EditPasswordController::class);
        yield MenuItem::linkToCrud('Modifier infos', 'fas fa-user-tie', Infos::class)
            ->setController(EditInfosController::class);
        yield MenuItem::linkToCrud('Modifier résumé', 'fas fa-align-justify', Infos::class)
            ->setController(EditResumeController::class);
        yield MenuItem::LinkToCrud('Modifier liens', 'fas fa-link', Link::class);
        yield MenuItem::LinkToCrud('Modifier la timeline', 'fas fa-calendar-alt', Timeline::class);
    }
}
