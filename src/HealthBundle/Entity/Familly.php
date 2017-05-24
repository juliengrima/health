<?php

namespace HealthBundle\Entity;

/**
 * Familly
 */
class Familly
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $statut;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $birthdate;

    /**
     * @var string
     */
    private $color;

    /**
     * @var \UserBundle\Entity\User
     */
    private $user;

    /**
     * @var \InformationBundle\Entity\Information
     */
    private $information;

    /**
     * @var \AppointmentBundle\Entity\Appointment
     */
    private $appointment;


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
     * Set picture
     *
     * @param string $picture
     *
     * @return Familly
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Familly
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set statut
     *
     * @param string $statut
     *
     * @return Familly
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Familly
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set birthdate
     *
     * @param string $birthdate
     *
     * @return Familly
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Familly
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Familly
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set information
     *
     * @param \InformationBundle\Entity\Information $information
     *
     * @return Familly
     */
    public function setInformation(\InformationBundle\Entity\Information $information = null)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return \InformationBundle\Entity\Information
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set appointment
     *
     * @param \AppointmentBundle\Entity\Appointment $appointment
     *
     * @return Familly
     */
    public function setAppointment(\AppointmentBundle\Entity\Appointment $appointment = null)
    {
        $this->appointment = $appointment;

        return $this;
    }

    /**
     * Get appointment
     *
     * @return \AppointmentBundle\Entity\Appointment
     */
    public function getAppointment()
    {
        return $this->appointment;
    }
}

