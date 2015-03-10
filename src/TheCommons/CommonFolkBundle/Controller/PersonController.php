<?php

namespace TheCommons\CommonFolkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TheCommons\CommonFolkBundle\Entity\Person;
use TheCommons\CommonFolkBundle\Form\PersonType;

/**
 * Person controller.
 *
 */
class PersonController extends Controller
{

    /**
     * Lists all Person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TheCommonsCommonFolkBundle:Person')->findAllOrdered();

        return $this->render('TheCommonsCommonFolkBundle:Person:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Person entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Person();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $nameFirst = $form->get('nameFirst')->getData();
            $this->get('session')->getFlashBag()->add('success',
                "<strong>$nameFirst</strong> was added successfully");

            return $this->redirect(
                $this->generateUrl(
                    'person_show',
                    array('id' => $entity->getId())
                )
            );
        }

        return $this->render('TheCommonsCommonFolkBundle:Person:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Person entity.
    *
    * @param Person $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Person $entity)
    {
        $form = $this->createForm(new PersonType(), $entity, array(
            'action' => $this->generateUrl('person_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Person entity.
     *
     */
    public function newAction()
    {
        $entity = new Person();
        $form   = $this->createCreateForm($entity);

        return $this->render('TheCommonsCommonFolkBundle:Person:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Person entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsCommonFolkBundle:Person')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Person entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TheCommonsCommonFolkBundle:Person:show.html.twig',
            array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing Person entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsCommonFolkBundle:Person')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Person entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TheCommonsCommonFolkBundle:Person:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Person entity.
    *
    * @param Person $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Person $entity)
    {
        $form = $this->createForm(new PersonType(), $entity, array(
            'action' => $this->generateUrl('person_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Person entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TheCommonsCommonFolkBundle:Person')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Person entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $nameFirst = $editForm->get('nameFirst')->getData();
            $this->get('session')->getFlashBag()->add('success',
                "<strong>$nameFirst</strong> was updated successfully");

            return $this->redirect($this->generateUrl('person_show',
                array('id' => $id)));
        }

        return $this->render('TheCommonsCommonFolkBundle:Person:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Person entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TheCommonsCommonFolkBundle:Person')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Person entity.');
            }

            $nameFirst = $entity->getNameFirst();
            $this->get('session')->getFlashBag()->add('warning',
                "<strong>$nameFirst</strong> was deleted");

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('person'));
    }

    /**
     * Creates a form to delete a Person entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('person_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}