<?php

namespace App\Controller;

use App\Repository\AdminRepository;
use App\Repository\TimelineRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param AdminRepository $adminRepository
     * @return Response
     */
    public function index(AdminRepository $adminRepository): Response
    {
        $admin = $adminRepository->findOneBy([]);

        return $this->render('portfolio/index.html.twig', [
            'page' => 'index',
            'admin' => $admin
        ]);
    }

    /**
     * @Route("/infos", name="infos")
     * @param AdminRepository $adminRepository
     * @return Response
     */
    public function infos(AdminRepository $adminRepository): Response
    {
        $admin = $adminRepository->findOneBy([]);

        return $this->render('portfolio/infos.html.twig', [
            'page' => 'infos',
            'admin' => $admin
        ]);
    }

    /**
     * @Route("/compétences", name="skills")
     * @return Response
     */
    public function skills(): Response
    {
        return $this->render('portfolio/skills.html.twig', [
            'page' => 'skills',
        ]);
    }

    /**
     * @Route("/projets", name="projects")
     * @return Response
     */
    public function projects(): Response
    {
        return $this->render('portfolio/projects.html.twig', [
            'page' => 'projects',
        ]);
    }

    /**
     * @param string $page
     * @param AdminRepository $adminRepository
     * @return Response
     */
    public function navbar(string $page, AdminRepository $adminRepository): Response
    {
        $admin = $adminRepository->findOneBy([]);

        return $this->render('portfolio/components/_navbar.html.twig', [
            'linkedIn' => $admin->getLinkedIn(),
            'github' => $admin->getGithub(),
            'page' => $page
        ]);
    }

    /**
     * @param TimelineRepository $timelineRepository
     * @return Response
     */
    public function timeline(TimelineRepository $timelineRepository): Response
    {
        $events = $timelineRepository->findBy([], ['startDate' => 'ASC']);
        $date = new DateTime('01-01-0000');

        return $this->render('portfolio/components/_timeline.html.twig', [
            'events' => $events,
            'dateList' => $date,
            'dateInfo' => $date
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function admin(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}
