<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class User
{
    protected $id;
    protected $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function addCategory($category)
    {
        $this->categories->add($category);
    }

    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}