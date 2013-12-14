<?php

namespace Acme\DemoBundle\Entity;

class User
{
    protected $id;
    protected $signedIn;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSignedIn()
    {
        return $this->signedIn;
    }

    /**
     * @param mixed $signedIn
     */
    public function setSignedIn($signedIn)
    {
        $this->signedIn = $signedIn;
    }
}