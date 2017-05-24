<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser
{
    protected $id;

    public function __construct()
    {
        parent::__construct ();
        // your own logic
    }

    /**
     * @var string
     */
    private $familly;

    /**
     * @var string
     */
    private $address;


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
     * Set familly
     *
     * @param string $familly
     *
     * @return User
     */
    public function setFamilly($familly)
    {
        $this->familly = $familly;

        return $this;
    }

    /**
     * Get familly
     *
     * @return string
     */
    public function getFamilly()
    {
        return $this->familly;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
