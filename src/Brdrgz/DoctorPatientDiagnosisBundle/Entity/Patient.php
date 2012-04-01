<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Brdrgz\DoctorPatientDiagnosisBundle\Entity\Patient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Brdrgz\DoctorPatientDiagnosisBundle\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $first_name
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $first_name;

    /**
     * @var string $last_name
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $last_name;

    /**
     * @var smallint $age
     *
     * @ORM\Column(name="age", type="smallint", length=1)
     */
    private $age;

		/**
		 * @ORM\ManyToOne(targetEntity="Doctor", inversedBy="patients")
		 * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
		 */
		private $doctor;

		/**
		 * @ORM\OneToMany(targetEntity="Diagnosis", mappedBy="patient")
		 */
		private $diagnoses;


    public function __construct()
    {
        $this->diagnoses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set age
     *
     * @param tinyint $age
     */
    public function setAge(\tinyint $age)
    {
        $this->age = $age;
    }

    /**
     * Get age
     *
     * @return tinyint 
     */
    public function getAge()
    {
        return $this->age;
    }
    
    /**
     * Set doctor
     *
     * @param Brdrgz\DoctorPatientDiagnosisBundle\Entity\Doctor $doctor
     */
    public function setDoctor(\Brdrgz\DoctorPatientDiagnosisBundle\Entity\Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * Get doctor
     *
     * @return Brdrgz\DoctorPatientDiagnosisBundle\Entity\Doctor 
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Add diagnoses
     *
     * @param Brdrgz\DoctorPatientDiagnosisBundle\Entity\Diagnosis $diagnoses
     */
    public function addDiagnosis(\Brdrgz\DoctorPatientDiagnosisBundle\Entity\Diagnosis $diagnoses)
    {
        $this->diagnoses[] = $diagnoses;
    }

    /**
     * Get diagnoses
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getDiagnoses()
    {
        return $this->diagnoses;
    }
}