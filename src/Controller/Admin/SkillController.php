<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/competences", name="skill_")
 */
class SkillController extends AbstractController
{
    /**
     * @Route("/", name="list")
     * @param SkillRepository $skillRepository
     * @return Response
     */
    public function list(SkillRepository $skillRepository): Response
    {
        $skills = $skillRepository->findAll();

        return $this->render('admin/skill/list.html.twig', [
            'skills' => $skills
        ]);
    }

    /**
     * @Route("/nouveau", name="new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($skill);
            $manager->flush();

            $this->addFlash('success', 'Compétence ' . $skill->getName() . ' correctement créé.');
            return $this->redirectToRoute('skill_list');
        }

        return $this->render('admin/skill/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edition/{id}", name="edit")
     * @param Skill $skill
     * @param Request $request
     * @return Response
     */
    public function edit(Skill $skill, Request $request): Response
    {
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($skill);
            $manager->flush();

            $this->addFlash('success', 'Compétence ' . $skill->getName() . ' correctement édité.');
            return $this->redirectToRoute('skill_list');
        }

        return $this->render('admin/skill/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Skill $skill
     * @param Request $request
     * @return Response
     */
    public function delete(Skill $skill, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skill->getId(), $request->request->get('_token'))) {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($skill);
            $manager->flush();

            $this->addFlash('danger', 'Compétence ' . $skill->getName() . ' correctement effacé.');
        }

        return $this->redirectToRoute('skill_list');
    }
}
