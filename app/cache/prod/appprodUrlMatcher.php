<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // brdrgz_doctorpatientdiagnosis_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'brdrgz_doctorpatientdiagnosis_default_index'));
        }

        // diagnosis
        if (rtrim($pathinfo, '/') === '/diagnosis') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'diagnosis');
            }
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::indexAction',  '_route' => 'diagnosis',);
        }

        // diagnosis_show
        if (0 === strpos($pathinfo, '/diagnosis') && preg_match('#^/diagnosis/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::showAction',)), array('_route' => 'diagnosis_show'));
        }

        // diagnosis_new
        if ($pathinfo === '/diagnosis/new') {
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::newAction',  '_route' => 'diagnosis_new',);
        }

        // diagnosis_create
        if ($pathinfo === '/diagnosis/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_diagnosis_create;
            }
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::createAction',  '_route' => 'diagnosis_create',);
        }
        not_diagnosis_create:

        // diagnosis_edit
        if (0 === strpos($pathinfo, '/diagnosis') && preg_match('#^/diagnosis/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::editAction',)), array('_route' => 'diagnosis_edit'));
        }

        // diagnosis_update
        if (0 === strpos($pathinfo, '/diagnosis') && preg_match('#^/diagnosis/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_diagnosis_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::updateAction',)), array('_route' => 'diagnosis_update'));
        }
        not_diagnosis_update:

        // diagnosis_delete
        if (0 === strpos($pathinfo, '/diagnosis') && preg_match('#^/diagnosis/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_diagnosis_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DiagnosisController::deleteAction',)), array('_route' => 'diagnosis_delete'));
        }
        not_diagnosis_delete:

        // doctor
        if (rtrim($pathinfo, '/') === '/doctor') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'doctor');
            }
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::indexAction',  '_route' => 'doctor',);
        }

        // doctor_show
        if (0 === strpos($pathinfo, '/doctor') && preg_match('#^/doctor/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::showAction',)), array('_route' => 'doctor_show'));
        }

        // doctor_new
        if ($pathinfo === '/doctor/new') {
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::newAction',  '_route' => 'doctor_new',);
        }

        // doctor_create
        if ($pathinfo === '/doctor/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_doctor_create;
            }
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::createAction',  '_route' => 'doctor_create',);
        }
        not_doctor_create:

        // doctor_edit
        if (0 === strpos($pathinfo, '/doctor') && preg_match('#^/doctor/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::editAction',)), array('_route' => 'doctor_edit'));
        }

        // doctor_update
        if (0 === strpos($pathinfo, '/doctor') && preg_match('#^/doctor/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_doctor_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::updateAction',)), array('_route' => 'doctor_update'));
        }
        not_doctor_update:

        // doctor_delete
        if (0 === strpos($pathinfo, '/doctor') && preg_match('#^/doctor/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_doctor_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\DoctorController::deleteAction',)), array('_route' => 'doctor_delete'));
        }
        not_doctor_delete:

        // patient
        if (rtrim($pathinfo, '/') === '/patient') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'patient');
            }
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::indexAction',  '_route' => 'patient',);
        }

        // patient_show
        if (0 === strpos($pathinfo, '/patient') && preg_match('#^/patient/(?P<id>[^/]+?)/show$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::showAction',)), array('_route' => 'patient_show'));
        }

        // patient_new
        if ($pathinfo === '/patient/new') {
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::newAction',  '_route' => 'patient_new',);
        }

        // patient_create
        if ($pathinfo === '/patient/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_patient_create;
            }
            return array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::createAction',  '_route' => 'patient_create',);
        }
        not_patient_create:

        // patient_edit
        if (0 === strpos($pathinfo, '/patient') && preg_match('#^/patient/(?P<id>[^/]+?)/edit$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::editAction',)), array('_route' => 'patient_edit'));
        }

        // patient_update
        if (0 === strpos($pathinfo, '/patient') && preg_match('#^/patient/(?P<id>[^/]+?)/update$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_patient_update;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::updateAction',)), array('_route' => 'patient_update'));
        }
        not_patient_update:

        // patient_delete
        if (0 === strpos($pathinfo, '/patient') && preg_match('#^/patient/(?P<id>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_patient_delete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Brdrgz\\DoctorPatientDiagnosisBundle\\Controller\\PatientController::deleteAction',)), array('_route' => 'patient_delete'));
        }
        not_patient_delete:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
