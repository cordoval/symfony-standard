<?php

namespace Acme\DemoBundle\Entity;

use Symfony\Component\Validator\ExecutionContextInterface;

class Page
{
    protected $id;
    protected $title;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function mycallback(ExecutionContextInterface $context)
    {
        die('here');
        return true;
    }
}