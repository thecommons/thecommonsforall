<?php

namespace TheCommons\SermonBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TheCommons\SermonBundle\Entity\SermonSeries;
use TheCommons\SermonBundle\Form\SermonSeriesType;

/**
 * SermonSeries controller.
 *
 */
class SermonSeriesController extends Controller
{

    /**
     * Lists all SermonSeries entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TheCommonsSermonBundle:SermonSeries')->findAll();

        return $this->render('TheCommonsSermonBundle:SermonSeries:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SermonSeries entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SermonSeries();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('series_show', array('id' => $entity->getId())));
        }

        return $this->render('TheCommonsSermonBundle:SermonSeries:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SermonSeries entity.
     *
     * @param SermonSeries $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SermonSeries $entity)
    {
        $form = $this->createForm(new SermonSeriesType(), $entity, array(
            'action' => $this->generateUrl('series_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SermonSeries entity.
     *
     */
    public function newAction()
    {
        $entity = new SermonSeries();
        $form   = $this->createCreateForm($entity);

        return $this->render('TheCommonsSermonBundle:SermonSeries:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SermonSeries entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsSermonBundle:SermonSeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SermonSeries entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TheCommonsSermonBundle:SermonSeries:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SermonSeries entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsSermonBundle:SermonSeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SermonSeries entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TheCommonsSermonBundle:SermonSeries:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SermonSeries entity.
    *
    * @param SermonSeries $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SermonSeries $entity)
    {
        $form = $this->createForm(new SermonSeriesType(), $entity, array(
            'action' => $this->generateUrl('series_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SermonSeries entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsSermonBundle:SermonSeries')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SermonSeries entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('series_edit', array('id' => $id)));
        }

        return $this->render('TheCommonsSermonBundle:SermonSeries:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SermonSeries entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TheCommonsSermonBundle:SermonSeries')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SermonSeries entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('series'));
    }

    /**
     * Creates a form to delete a SermonSeries entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('series_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
