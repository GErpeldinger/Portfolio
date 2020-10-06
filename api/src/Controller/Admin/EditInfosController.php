<?php

namespace App\Controller\Admin;

use App\Entity\Infos;
use App\Form\EditInfosType;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\RequestStack;

class EditInfosController extends AbstractCrudController
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public static function getEntityFqcn(): string
    {
        return Infos::class;
    }

    public function index(AdminContext $context)
    {
        $infos = $this->getDoctrine()->getRepository(Infos::class)->findOneBy([]);
        $form = $this->createForm(EditInfosType::class, $infos);
        $form->handleRequest($this->requestStack->getCurrentRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/edit_infos.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
