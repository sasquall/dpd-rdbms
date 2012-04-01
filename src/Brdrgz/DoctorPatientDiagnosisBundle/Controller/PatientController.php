<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Brdrgz\DoctorPatientDiagnosisBundle\Entity\Patient;
use Brdrgz\DoctorPatientDiagnosisBundle\Form\PatientType;

/**
 * Patient controller.
 *
 * @Route("/patient")
 */
class PatientController extends Controller
{
    /**
     * Lists all Patient entities.
     *
     * @Route("/", name="patient")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Patient')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Patient entity.
     *
     * @Route("/{id}/show", name="patient_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Patient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Patient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Patient entity.
     *
     * @Route("/new", name="patient_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Patient();
        $form   = $this->createForm(new PatientType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Patient entity.
     *
     * @Route("/create", name="patient_create")
     * @Method("post")
     * @Template("BrdrgzDoctorPatientDiagnosisBundle:Patient:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Patient();
        $request = $this->getRequest();
        $form    = $this->createForm(new PatientType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('patient_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Patient entity.
     *
     * @Route("/{id}/edit", name="patient_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Patient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Patient entity.');
        }

        $editForm = $this->createForm(new PatientType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Patient entity.
     *
     * @Route("/{id}/update", name="patient_update")
     * @Method("post")
     * @Template("BrdrgzDoctorPatientDiagnosisBundle:Patient:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Patient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Patient entity.');
        }

        $editForm   = $this->createForm(new PatientType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('patient_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Patient entity.
     *
     * @Route("/{id}/delete", name="patient_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Patient')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Patient entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('patient'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
