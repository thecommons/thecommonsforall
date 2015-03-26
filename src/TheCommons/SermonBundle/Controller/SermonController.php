<?php

namespace TheCommons\SermonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TheCommons\SermonBundle\Entity\Sermon;
use TheCommons\SermonBundle\Form\SermonType;

/**
 * Sermon controller.
 *
 */
class SermonController extends Controller
{

    /**
     * Lists all Sermon entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TheCommonsSermonBundle:Sermon')->findAll();

        return $this->render('TheCommonsSermonBundle:Sermon:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Sermon entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Sermon();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sermon_show', array('id' => $entity->getId())));
        }

        return $this->render('TheCommonsSermonBundle:Sermon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Sermon entity.
     *
     * @param Sermon $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Sermon $entity)
    {
        $form = $this->createForm(new SermonType(), $entity, array(
            'action' => $this->generateUrl('sermon_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sermon entity.
     *
     */
    public function newAction()
    {
        $entity = new Sermon();
        $form   = $this->createCreateForm($entity);

        return $this->render('TheCommonsSermonBundle:Sermon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sermon entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsSermonBundle:Sermon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sermon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TheCommonsSermonBundle:Sermon:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sermon entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsSermonBundle:Sermon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sermon entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TheCommonsSermonBundle:Sermon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Sermon entity.
    *
    * @param Sermon $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sermon $entity)
    {
        $form = $this->createForm(new SermonType(), $entity, array(
            'action' => $this->generateUrl('sermon_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sermon entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsSermonBundle:Sermon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sermon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sermon_edit', array('id' => $id)));
        }

        return $this->render('TheCommonsSermonBundle:Sermon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Sermon entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TheCommonsSermonBundle:Sermon')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sermon entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sermon'));
    }

    /**
     * Creates a form to delete a Sermon entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sermon_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
