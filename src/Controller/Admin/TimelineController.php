<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use App\Form\TimelineType;
use App\Repository\TimelineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/evenements", name="timeline_")
 */
class TimelineController extends AbstractController
{
    /**
     * @Route("/", name="list")
     * @param TimelineRepository $timelineRepository
     * @return Response
     */
    public function list(TimelineRepository $timelineRepository): Response
    {
        $events = $timelineRepository->findAll();

        return $this->render('admin/timeline/list.html.twig', [
            'timelines' => $events
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     * @param Timeline $event
     * @return Response
     */
    public function show(Timeline $event): Response
    {
        return $this->render('admin/timeline/show.html.twig', [
            'event' => $event
        ]);
    }

    /**
     * @Route("/nouveau", name="new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $event = new Timeline();
        $form = $this->createForm(TimelineType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($event);
            $manager->flush();

            $this->addFlash('success', 'Évènement ' . $event->getTitle() . ' correctement créé.');
            return $this->redirectToRoute('timeline_list');
        }

        return $this->render('admin/timeline/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edition/{id}", name="edit")
     * @param Timeline $event
     * @param Request $request
     * @return Response
     */
    public function edit(Timeline $event, Request $request): Response
    {
        $form = $this->createForm(TimelineType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($event);
            $manager->flush();

            $this->addFlash('success', 'Évènement ' . $event->getTitle() . ' correctement édité.');
            return $this->redirectToRoute('timeline_list');
        }

        return $this->render('admin/timeline/form.html.twig', [
            'form' => $form->createView(),
            'event' => $event
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Timeline $timeline
     * @param Request $request
     * @return Response
     */
    public function delete(Timeline $timeline, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete'.$timeline->getId(), $request->request->get('_token'))) {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($timeline);
            $manager->flush();

            $this->addFlash('danger', 'Évènement ' . $timeline->getTitle() . ' correctement effacé.');
        }

        return $this->redirectToRoute('timeline_list');
    }
}
