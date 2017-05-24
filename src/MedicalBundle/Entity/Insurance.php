<?php

namespace MedicalBundle\Entity;

/**
 * Insurance
 */
class Insurance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $insurance;


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
     * Set insurance
     *
     * @param string $insurance
     *
     * @return Insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;

        return $this;
    }

    /**
     * Get insurance
     *
     * @return string
     */
    public function getInsurance()
    {
        return $this->insurance;
    }
}

