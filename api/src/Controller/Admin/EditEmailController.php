<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Form\EditEmailType;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\RequestStack;

class EditEmailController extends AbstractCrudController
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function index(AdminContext $context)
    {
        $form = $this->createForm(EditEmailType::class, $this->getUser());
        $form->handleRequest($this->requestStack->getCurrentRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/edit_email.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
