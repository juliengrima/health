<?php

namespace AppointmentBundle\Entity;

/**
 * Appointment
 */
class Appointment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $action;


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
     * Set date
     *
     * @param string $date
     *
     * @return Appointment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Appointment
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
    /**
     * @var \MedicalBundle\Entity\Dentist
     */
    private $dentist;

    /**
     * @var \MedicalBundle\Entity\Insurance
     */
    private $insurance;

    /**
     * @var \MedicalBundle\Entity\Medication
     */
    private $medication;

    /**
     * @var \MedicalBundle\Entity\Others
     */
    private $other;

    /**
     * @var \MedicalBundle\Entity\Vaccines
     */
    private $vaccines;

    /**
     * @var \MedicalBundle\Entity\Xrays
     */
    private $xray;


    /**
     * Set dentist
     *
     * @param \MedicalBundle\Entity\Dentist $dentist
     *
     * @return Appointment
     */
    public function setDentist(\MedicalBundle\Entity\Dentist $dentist = null)
    {
        $this->dentist = $dentist;

        return $this;
    }

    /**
     * Get dentist
     *
     * @return \MedicalBundle\Entity\Dentist
     */
    public function getDentist()
    {
        return $this->dentist;
    }

    /**
     * Set insurance
     *
     * @param \MedicalBundle\Entity\Insurance $insurance
     *
     * @return Appointment
     */
    public function setInsurance(\MedicalBundle\Entity\Insurance $insurance = null)
    {
        $this->insurance = $insurance;

        return $this;
    }

    /**
     * Get insurance
     *
     * @return \MedicalBundle\Entity\Insurance
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * Set medication
     *
     * @param \MedicalBundle\Entity\Medication $medication
     *
     * @return Appointment
     */
    public function setMedication(\MedicalBundle\Entity\Medication $medication = null)
    {
        $this->medication = $medication;

        return $this;
    }

    /**
     * Get medication
     *
     * @return \MedicalBundle\Entity\Medication
     */
    public function getMedication()
    {
        return $this->medication;
    }

    /**
     * Set other
     *
     * @param \MedicalBundle\Entity\Others $other
     *
     * @return Appointment
     */
    public function setOther(\MedicalBundle\Entity\Others $other = null)
    {
        $this->other = $other;

        return $this;
    }

    /**
     * Get other
     *
     * @return \MedicalBundle\Entity\Others
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * Set vaccines
     *
     * @param \MedicalBundle\Entity\Vaccines $vaccines
     *
     * @return Appointment
     */
    public function setVaccines(\MedicalBundle\Entity\Vaccines $vaccines = null)
    {
        $this->vaccines = $vaccines;

        return $this;
    }

    /**
     * Get vaccines
     *
     * @return \MedicalBundle\Entity\Vaccines
     */
    public function getVaccines()
    {
        return $this->vaccines;
    }

    /**
     * Set xray
     *
     * @param \MedicalBundle\Entity\Xrays $xray
     *
     * @return Appointment
     */
    public function setXray(\MedicalBundle\Entity\Xrays $xray = null)
    {
        $this->xray = $xray;

        return $this;
    }

    /**
     * Get xray
     *
     * @return \MedicalBundle\Entity\Xrays
     */
    public function getXray()
    {
        return $this->xray;
    }
}
