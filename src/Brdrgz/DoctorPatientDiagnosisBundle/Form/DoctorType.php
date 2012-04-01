<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DoctorType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('degrees')
            ->add('email')
            ->add('portrait')
        ;
    }

    public function getName()
    {
        return 'brdrgz_doctorpatientdiagnosisbundle_doctortype';
    }
}