<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Brdrgz\DoctorPatientDiagnosisBundle\Entity\Diagnosis;
use Brdrgz\DoctorPatientDiagnosisBundle\Form\DiagnosisType;

/**
 * Diagnosis controller.
 *
 * @Route("/diagnosis")
 */
class DiagnosisController extends Controller
{
    /**
     * Lists all Diagnosis entities.
     *
     * @Route("/", name="diagnosis")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Diagnosis entity.
     *
     * @Route("/{id}/show", name="diagnosis_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diagnosis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Diagnosis entity.
     *
     * @Route("/new", name="diagnosis_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Diagnosis();
        $form   = $this->createForm(new DiagnosisType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Diagnosis entity.
     *
     * @Route("/create", name="diagnosis_create")
     * @Method("post")
     * @Template("BrdrgzDoctorPatientDiagnosisBundle:Diagnosis:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Diagnosis();
        $request = $this->getRequest();
        $form    = $this->createForm(new DiagnosisType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('diagnosis_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Diagnosis entity.
     *
     * @Route("/{id}/edit", name="diagnosis_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diagnosis entity.');
        }

        $editForm = $this->createForm(new DiagnosisType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Diagnosis entity.
     *
     * @Route("/{id}/update", name="diagnosis_update")
     * @Method("post")
     * @Template("BrdrgzDoctorPatientDiagnosisBundle:Diagnosis:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diagnosis entity.');
        }

        $editForm   = $this->createForm(new DiagnosisType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('diagnosis_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Diagnosis entity.
     *
     * @Route("/{id}/delete", name="diagnosis_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Diagnosis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('diagnosis'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
