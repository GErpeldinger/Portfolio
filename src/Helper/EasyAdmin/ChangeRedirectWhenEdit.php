<?php

namespace App\Helper\EasyAdmin;

use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterCrudActionEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeCrudActionEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Exception\ForbiddenActionException;
use EasyCorp\Bundle\EasyAdminBundle\Exception\InsufficientEntityPermissionException;
use EasyCorp\Bundle\EasyAdminBundle\Factory\EntityFactory;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityUpdater;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Security\Permission;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

trait ChangeRedirectWhenEdit
{
    private FlashBagInterface $flashBag;

    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }

    public function edit(AdminContext $context)
    {
        $event = new BeforeCrudActionEvent($context);
        $this->get('event_dispatcher')->dispatch($event);
        if ($event->isPropagationStopped()) {
            return $event->getResponse();
        }

        if (!$this->isGranted(Permission::EA_EXECUTE_ACTION)) {
            throw new ForbiddenActionException($context);
        }

        if (!$context->getEntity()->isAccessible()) {
            throw new InsufficientEntityPermissionException($context);
        }

        $this->get(EntityFactory::class)->processFields($context->getEntity(), FieldCollection::new($this->configureFields(Crud::PAGE_EDIT)));
        $this->get(EntityFactory::class)->processActions($context->getEntity(), $context->getCrud()->getActionsConfig());
        $entityInstance = $context->getEntity()->getInstance();

        if ($context->getRequest()->isXmlHttpRequest()) {
            $fieldName = $context->getRequest()->query->get('fieldName');
            $newValue = 'true' === mb_strtolower($context->getRequest()->query->get('newValue'));

            $event = $this->ajaxEdit($context->getEntity(), $fieldName, $newValue);
            if ($event->isPropagationStopped()) {
                return $event->getResponse();
            }

            // cast to integer instead of string to avoid sending empty responses for 'false'
            return new Response((int) $newValue);
        }

        $editForm = $this->createEditForm($context->getEntity(), $context->getCrud()->getEditFormOptions(), $context);
        $editForm->handleRequest($context->getRequest());
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $event = new BeforeEntityUpdatedEvent($entityInstance);
            $this->get('event_dispatcher')->dispatch($event);
            $entityInstance = $event->getEntityInstance();

            $this->updateEntity($this->get('doctrine')->getManagerForClass($context->getEntity()->getFqcn()), $entityInstance);

            $this->get('event_dispatcher')->dispatch(new AfterEntityUpdatedEvent($entityInstance));

            $submitButtonName = $context->getRequest()->request->get('ea')['newForm']['btn'];
            if (Action::SAVE_AND_CONTINUE === $submitButtonName) {
                $url = $this->get(CrudUrlGenerator::class)->build()
                    ->setAction(Action::EDIT)
                    ->setEntityId($context->getEntity()->getPrimaryKeyValue())
                    ->generateUrl();

                return $this->redirect($url);
            }

            if (Action::SAVE_AND_RETURN === $submitButtonName) {
                $this->flashBag->add('success', 'Modification effectué avec succès !');
                return $this->redirectToRoute('admin');
            }
        }

        $responseParameters = $this->configureResponseParameters(KeyValueStore::new([
            'pageName' => Crud::PAGE_EDIT,
            'templateName' => 'crud/edit',
            'edit_form' => $editForm,
            'entity' => $context->getEntity(),
        ]));

        $event = new AfterCrudActionEvent($context, $responseParameters);
        $this->get('event_dispatcher')->dispatch($event);
        if ($event->isPropagationStopped()) {
            return $event->getResponse();
        }

        return $responseParameters;
    }

    private function ajaxEdit(EntityDto $entityDto, ?string $propertyName, bool $newValue): AfterCrudActionEvent
    {
        if (!$entityDto->hasProperty($propertyName)) {
            throw new \RuntimeException(sprintf('The "%s" boolean field cannot be changed because it doesn\'t exist in the "%s" entity.', $propertyName, $entityDto->getName()));
        }

        $this->get(EntityUpdater::class)->updateProperty($entityDto, $propertyName, $newValue);

        $event = new BeforeEntityUpdatedEvent($entityDto->getInstance());
        $this->get('event_dispatcher')->dispatch($event);
        $entityInstance = $event->getEntityInstance();

        $this->updateEntity($this->get('doctrine')->getManagerForClass($entityDto->getFqcn()), $entityInstance);

        $this->get('event_dispatcher')->dispatch(new AfterEntityUpdatedEvent($entityInstance));

        $entityDto->setInstance($entityInstance);

        $parameters = KeyValueStore::new([
            'action' => Action::EDIT,
            'entity' => $entityDto,
        ]);

        $event = new AfterCrudActionEvent($this->getContext(), $parameters);
        $this->get('event_dispatcher')->dispatch($event);

        return $event;
    }

    private function getContext(): ?AdminContext
    {
        return $this->get(AdminContextProvider::class)->getContext();
    }
}
