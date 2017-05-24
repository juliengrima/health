<?php

namespace MedicalBundle\Entity;

/**
 * Dentist
 */
class Dentist
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $dentist;


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
     * Set dentist
     *
     * @param string $dentist
     *
     * @return Dentist
     */
    public function setDentist($dentist)
    {
        $this->dentist = $dentist;

        return $this;
    }

    /**
     * Get dentist
     *
     * @return string
     */
    public function getDentist()
    {
        return $this->dentist;
    }
}

