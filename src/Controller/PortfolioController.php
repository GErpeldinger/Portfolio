<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'page' => 'index',
        ]);
    }

    /**
     * @Route("/info", name="info")
     */
    public function info(): Response
    {
        return $this->render('info.html.twig', [
            'page' => 'info',
        ]);
    }

    /**
     * @Route("/compétences", name="skills")
     */
    public function skills(): Response
    {
        return $this->render('skills.html.twig', [
            'page' => 'skills',
        ]);
    }

    /**
     * @Route("/projets", name="projects")
     */
    public function projects(): Response
    {
        return $this->render('projects.html.twig', [
            'page' => 'projects',
        ]);
    }


}
