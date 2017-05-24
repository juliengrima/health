<?php

namespace MedicalBundle\Entity;

/**
 * Others
 */
class Others
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $others;


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
     * Set others
     *
     * @param string $others
     *
     * @return Others
     */
    public function setOthers($others)
    {
        $this->others = $others;

        return $this;
    }

    /**
     * Get others
     *
     * @return string
     */
    public function getOthers()
    {
        return $this->others;
    }
}

