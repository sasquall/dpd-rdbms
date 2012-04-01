<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        // _demo_login
        if ($pathinfo === '/demo/secured/login') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _security_check
        if ($pathinfo === '/demo/secured/login_check') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _demo_logout
        if ($pathinfo === '/demo/secured/logout') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // acme_demo_secured_hello
        if ($pathinfo === '/demo/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

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
