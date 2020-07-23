<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/projets", name="project_")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="list")
     * @param ProjectRepository $projectRepository
     * @return Response
     */
    public function list(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->render('admin/project/list.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/nouveau", name="new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($project);
            $manager->flush();

            $this->addFlash('success', 'Projet ' . $project->getTitle() . ' correctement créé.');
            return $this->redirectToRoute('project_list');
        }

        return $this->render('admin/project/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edition/{id}", name="edit")
     * @param Project $project
     * @param Request $request
     * @return Response
     */
    public function edit(Project $project, Request $request): Response
    {
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($project);
            $manager->flush();

            $this->addFlash('success', 'Projet ' . $project->getTitle() . ' correctement édité.');
            return $this->redirectToRoute('project_list');
        }

        return $this->render('admin/project/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Project $project
     * @param Request $request
     * @return Response
     */
    public function delete(Project $project, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project->getId(), $request->request->get('_token'))) {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($project);
            $manager->flush();

            $this->addFlash('danger', 'Projet ' . $project->getTitle() . ' correctement effacé.');
        }

        return $this->redirectToRoute('project_list');
    }
}
