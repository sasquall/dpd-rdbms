<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DiagnosisType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('reference_number')
            ->add('description')
        ;
    }

    public function getName()
    {
        return 'brdrgz_doctorpatientdiagnosisbundle_diagnosistype';
    }
}
