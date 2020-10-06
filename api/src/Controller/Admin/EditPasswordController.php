<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Form\EditPasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EditPasswordController extends AbstractCrudController
{
    private RequestStack $requestStack;
    private UserPasswordEncoderInterface $encoder;

    public function __construct(RequestStack $requestStack, UserPasswordEncoderInterface $encoder)
    {
        $this->requestStack = $requestStack;
        $this->encoder = $encoder;
    }

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function index(AdminContext $context)
    {
        $form = $this->createForm(EditPasswordType::class, $this->getUser());
        $form->handleRequest($this->requestStack->getCurrentRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $this->getUser()->setPassword($this->encoder->encodePassword($this->getUser(), $form->getData()->getPassword()));
            $manager->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/edit_password.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
