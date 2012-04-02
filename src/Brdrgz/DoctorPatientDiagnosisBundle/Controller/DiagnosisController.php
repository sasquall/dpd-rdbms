<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Brdrgz\DoctorPatientDiagnosisBundle\Entity\Diagnosis;
use Brdrgz\DoctorPatientDiagnosisBundle\Form\DiagnosisType;

use DoctrineExtensions\Paginate\Paginate;

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
        $request = $this->getRequest();
        $page = $request->request->get('page', 1);
        $show = $request->request->get('show', 10);
        $offset = ($page-1)*$show;
        $limitPerPage = $show;
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $qb = $em->createQueryBuilder()->select('d')->from('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis', 'd')->orderBy('d.id');
        $dql = $qb->getDql();
        $query = $em->createQuery($dql);
        
        $count = Paginate::getTotalQueryResults($query);
        
        if ($page > 1 && $count <= $show) {
            $page = 1;
            $offset = 0;
        }
        
        $paginateQuery = Paginate::getPaginateQuery($query, $offset, $limitPerPage);
        
        $entities = $paginateQuery->getResult();

        //$entities = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Diagnosis')->findAll();

        return array(
            'entities'  => $entities,
            'action'    => 'index',
            'show'      => $show,
            'cur_pg'    => $page,
            'tot_pg'    => ceil($count/$show)
        );
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
            'delete_form' => $deleteForm->createView(),
            'action'      => 'show'
        );
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
            'form'   => $form->createView(),
            'action' => 'new'
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
            'form'   => $form->createView(),
            'action' => 'create'
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
            'action'      => 'edit'
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
            'action'      => 'update'
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
