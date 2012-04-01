<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Brdrgz\DoctorPatientDiagnosisBundle\Entity\Diagnosis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Brdrgz\DoctorPatientDiagnosisBundle\Repository\DiagnosisRepository")
 */
class Diagnosis
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $reference_number
     *
     * @ORM\Column(name="reference_number", type="string", length=7)
     */
    private $reference_number;

		/**
		 * @ORM\OneToMany(targetEntity="Patient", mappedBy="diagnosis")
		 */
		private $patients;


    public function __construct()
    {
        $this->patients = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reference_number
     *
     * @param string $referenceNumber
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->reference_number = $referenceNumber;
    }

    /**
     * Get reference_number
     *
     * @return string 
     */
    public function getReferenceNumber()
    {
        return $this->reference_number;
    }
    
    /**
     * Add patients
     *
     * @param Brdrgz\DoctorPatientDiagnosisBundle\Entity\Patient $patients
     */
    public function addPatient(\Brdrgz\DoctorPatientDiagnosisBundle\Entity\Patient $patients)
    {
        $this->patients[] = $patients;
    }

    /**
     * Get patients
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPatients()
    {
        return $this->patients;
    }
}