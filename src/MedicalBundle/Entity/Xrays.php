<?php

namespace MedicalBundle\Entity;

/**
 * Xrays
 */
class Xrays
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $xrays;


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
     * Set xrays
     *
     * @param string $xrays
     *
     * @return Xrays
     */
    public function setXrays($xrays)
    {
        $this->xrays = $xrays;

        return $this;
    }

    /**
     * Get xrays
     *
     * @return string
     */
    public function getXrays()
    {
        return $this->xrays;
    }
}

