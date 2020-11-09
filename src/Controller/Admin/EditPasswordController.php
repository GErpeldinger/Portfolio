<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Exception\DifferentPasswordException;
use App\Exception\IdenticalPasswordException;
use App\Helper\EasyAdmin\ChangeRedirectWhenEdit;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EditPasswordController extends AbstractCrudController
{
    use ChangeRedirectWhenEdit;

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(FlashBagInterface $flashBag, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->flashBag = $flashBag; // Used in Trait ChangeRedirectingWhenEdit
    }

    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier le mot de passe');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE);
    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param Admin $entityInstance
     */
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $password = $entityInstance->getPlainPassword();
        $repeatPassword = $entityInstance->getPlainPasswordTwo();

        if ($password === $repeatPassword) {
            if (!$this->passwordEncoder->isPasswordValid($entityInstance, $password)) {
                $entityInstance->setPassword($this->passwordEncoder->encodePassword($entityInstance, $password));
                $entityManager->persist($entityInstance);
                $entityManager->flush();
            } else {
                throw new IdenticalPasswordException('Le nouveau password est identique à celui déjà existant.');
            }
        } else {
            throw new DifferentPasswordException('Le nouveau mot de passe et celui répété sont différent.');
        }
    }

    public function configureFields(string $pageName): iterable
    {
        $plainPassword = TextField::new('plainPassword', 'Nouveau password')
            ->setFormType(PasswordType::class)
            ->setRequired(true);
        $password = TextField::new('plainPasswordTwo', 'Répéter nouveau password')
            ->setFormType(PasswordType::class)
            ->setRequired(true);

        return [$plainPassword, $password];
    }
}
