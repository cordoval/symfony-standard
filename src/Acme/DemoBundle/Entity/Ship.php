<?php

namespace Acme\DemoBundle\Entity;

class Ship
{
    protected $id;
    protected $shipName;
    protected $category;

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
    public function getShipName()
    {
        return $this->shipName;
    }

    /**
     * @param mixed $shipName
     */
    public function setShipName($shipName)
    {
        $this->shipName = $shipName;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
}