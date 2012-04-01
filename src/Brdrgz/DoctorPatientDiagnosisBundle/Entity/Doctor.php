<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Brdrgz\DoctorPatientDiagnosisBundle\Entity\Doctor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Brdrgz\DoctorPatientDiagnosisBundle\Repository\DoctorRepository")
 */
class Doctor
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
     * @var varchar $degrees
     *
     * @ORM\Column(name="degrees", type="string", length=255)
     */
    private $degrees;

    /**
     * @var varchar $email
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var varchar $portrait
     *
     * @ORM\Column(name="portrait", type="text", length=255)
     */
    private $portrait;

		/**
		 * @ORM\OneToMany(targetEntity="Patient", mappedBy="doctor")
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
     * Set degrees
     *
     * @param varchar $degrees
     */
    public function setDegrees(\varchar $degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * Get degrees
     *
     * @return varchar 
     */
    public function getDegrees()
    {
        return $this->degrees;
    }

    /**
     * Set email
     *
     * @param varchar $email
     */
    public function setEmail(\varchar $email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return varchar 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set portrait
     *
     * @param varchar $portrait
     */
    public function setPortrait(\varchar $portrait)
    {
        $this->portrait = $portrait;
    }

    /**
     * Get portrait
     *
     * @return varchar 
     */
    public function getPortrait()
    {
        return $this->portrait;
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