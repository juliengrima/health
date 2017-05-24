<?php

namespace MedicalBundle\Entity;

/**
 * Vaccines
 */
class Vaccines
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $vaccines;


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
     * Set vaccines
     *
     * @param string $vaccines
     *
     * @return Vaccines
     */
    public function setVaccines($vaccines)
    {
        $this->vaccines = $vaccines;

        return $this;
    }

    /**
     * Get vaccines
     *
     * @return string
     */
    public function getVaccines()
    {
        return $this->vaccines;
    }
}

