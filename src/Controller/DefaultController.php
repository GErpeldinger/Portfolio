<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/competences", name="skill")
     */
    public function skill(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/projets", name="projects")
     */
    public function projects(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/projets/{slug}", name="show_project")
     * slug: Slugify name of the project.
     */
    public function showProject(): Response
    {
        return $this->render('index.html.twig');
    }
}
