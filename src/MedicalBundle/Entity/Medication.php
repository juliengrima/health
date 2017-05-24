<?php

namespace MedicalBundle\Entity;

/**
 * Medication
 */
class Medication
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $medication;


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
     * Set medication
     *
     * @param string $medication
     *
     * @return Medication
     */
    public function setMedication($medication)
    {
        $this->medication = $medication;

        return $this;
    }

    /**
     * Get medication
     *
     * @return string
     */
    public function getMedication()
    {
        return $this->medication;
    }
}

