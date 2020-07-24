<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Repository\AdminRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use App\Repository\TimelineRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param AdminRepository $adminRepository
     * @return Response
     */
    public function index(AdminRepository $adminRepository): Response
    {
        return $this->render('portfolio/index.html.twig', [
            'page' => 'index',
            'admin' => $adminRepository->findOneBy([])
        ]);
    }

    /**
     * @Route("/infos", name="infos")
     * @param AdminRepository $adminRepository
     * @return Response
     */
    public function infos(AdminRepository $adminRepository): Response
    {
        return $this->render('portfolio/infos.html.twig', [
            'page' => 'infos',
            'admin' => $adminRepository->findOneBy([])
        ]);
    }

    /**
     * @Route("/compétences", name="skills")
     * @param AdminRepository $adminRepository
     * @param SkillRepository $skillRepository
     * @return Response
     */
    public function skills(AdminRepository $adminRepository, SkillRepository $skillRepository): Response
    {
        return $this->render('portfolio/skills.html.twig', [
            'page' => 'skills',
            'admin' => $adminRepository->findOneBy([]),
            'skills' => $skillRepository->findAll()
        ]);
    }

    /**
     * @Route("/projets", name="projects")
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function projects(ProjectRepository $projectRepository): Response
    {
        return $this->render('portfolio/projects.html.twig', [
            'page' => 'projects',
            'projects' => $projectRepository->findAll()
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
            'email' => $admin->getEmail(),
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
     * @Route("/login", name="admin_login")
     * @param AuthenticationUtils $authenticationUtils
     * @param AdminRepository $adminRepository
     * @return Response
     */
    public function admin_login(AuthenticationUtils $authenticationUtils, AdminRepository $adminRepository): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'admin' => $adminRepository->findOneBy([])
        ]);
    }
}
