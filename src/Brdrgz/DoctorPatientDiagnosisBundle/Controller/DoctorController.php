<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Brdrgz\DoctorPatientDiagnosisBundle\Entity\Doctor;
use Brdrgz\DoctorPatientDiagnosisBundle\Form\DoctorType;

/**
 * Doctor controller.
 *
 * @Route("/doctor")
 */
class DoctorController extends Controller
{
    /**
     * Lists all Doctor entities.
     *
     * @Route("/", name="doctor")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Doctor')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Doctor entity.
     *
     * @Route("/{id}/show", name="doctor_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Doctor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Doctor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Doctor entity.
     *
     * @Route("/new", name="doctor_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Doctor();
        $form   = $this->createForm(new DoctorType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Doctor entity.
     *
     * @Route("/create", name="doctor_create")
     * @Method("post")
     * @Template("BrdrgzDoctorPatientDiagnosisBundle:Doctor:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Doctor();
        $request = $this->getRequest();
        $form    = $this->createForm(new DoctorType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('doctor_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Doctor entity.
     *
     * @Route("/{id}/edit", name="doctor_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Doctor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Doctor entity.');
        }

        $editForm = $this->createForm(new DoctorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Doctor entity.
     *
     * @Route("/{id}/update", name="doctor_update")
     * @Method("post")
     * @Template("BrdrgzDoctorPatientDiagnosisBundle:Doctor:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Doctor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Doctor entity.');
        }

        $editForm   = $this->createForm(new DoctorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('doctor_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Doctor entity.
     *
     * @Route("/{id}/delete", name="doctor_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Doctor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Doctor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('doctor'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
