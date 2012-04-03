<?php

namespace Brdrgz\DoctorPatientDiagnosisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     */
    private $first_name;

    /**
     * @var string $last_name
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     */
    private $last_name;

    /**
     * @var string $degrees
     *
     * @ORM\Column(name="degrees", type="string", length=255)
     */
    private $degrees;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true, nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var text $portrait
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
     * @param string $degrees
     */
    public function setDegrees($degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * Get degrees
     *
     * @return string
     */
    public function getDegrees()
    {
        return $this->degrees;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set portrait
     *
     * @param text $portrait
     */
    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;
    }

    /**
     * Get portrait
     *
     * @return text 
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
    
    /**
     * Get string identifier
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->last_name . ', ' . $this->first_name . ' (' . $this->degrees . ')';
    }
}