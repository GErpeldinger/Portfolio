<?php

namespace App\Controller\Admin;

use App\Form\AdminType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="panel")
     * @return Response
     */
    public function panel(): Response
    {
        return $this->render('admin/panel.html.twig');
    }

    /**
     * @Route("/utilisateur", name="user_show")
     * @return Response
     */
    public function show(): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'admin' => $this->getUser()
        ]);
    }

    /**
     * @Route("/utilisateur/edition/{action}", name="user_edit")
     * @param string $action
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function edit(string $action, Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(AdminType::class, $this->getUser(), ['action' => $action]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            if ($action === AdminType::PASSWORD) {
                $this->getUser()->setPassword($encoder->encodePassword($this->getUser(), $form->getData()->getPassword()));
            }

            $manager->flush();

            return $this->redirectToRoute('admin_user_show');
        }

        return $this->render('admin/user/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
