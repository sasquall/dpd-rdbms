<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Brdrgz\DoctorPatientDiagnosisBundle\Entity\Doctor;
use Brdrgz\DoctorPatientDiagnosisBundle\Form\DoctorType;

use DoctrineExtensions\Paginate\Paginate;

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
        $request = $this->getRequest();
        $page = $request->request->get('page', 1);
        $show = $request->request->get('show', 10);
        $offset = ($page-1)*$show;
        $limitPerPage = $show;
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $qb = $em->createQueryBuilder()->select('d')->from('BrdrgzDoctorPatientDiagnosisBundle:Doctor', 'd')->orderBy('d.id');
        $dql = $qb->getDql();
        $query = $em->createQuery($dql);
        
        $count = Paginate::getTotalQueryResults($query);
        
        if ($page > 1 && $count <= $show) {
            $page = 1;
            $offset = 0;
        }
        
        $paginateQuery = Paginate::getPaginateQuery($query, $offset, $limitPerPage);
        
        $entities = $paginateQuery->getResult();

        //$entities = $em->getRepository('BrdrgzDoctorPatientDiagnosisBundle:Doctor')->findAll();

        return array(
            'entities'  => $entities,
            'action'    => 'index',
            'show'      => $show,
            'cur_pg'    => $page,
            'tot_pg'    => ceil($count/$show)
        );
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
            'delete_form' => $deleteForm->createView(),
            'action'      => 'show'
        );
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
            'form'   => $form->createView(),
            'action' => 'new'
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
            'form'   => $form->createView(),
            'action' => 'create'
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
            'action'      => 'edit'
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
            'action'      => 'update'
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
