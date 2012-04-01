<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('age')
            ->add('doctor')
        ;
    }

    public function getName()
    {
        return 'brdrgz_doctorpatientdiagnosisbundle_patienttype';
    }
}
