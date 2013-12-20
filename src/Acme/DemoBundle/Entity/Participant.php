<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Participant
{
    protected $id;
    protected $emails;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('emails', new Assert\Count(array(
            'min'        => 1,
            'max'        => 5,
            'minMessage' => 'You must specify at least one email',
            'maxMessage' => 'You cannot specify more than {{ limit }} emails',
        )));
    }

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
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param mixed $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    public function addEmail($email)
    {
        $this->emails->add($email);
    }

    public function removeEmail($email)
    {
        $this->emails->removeElement($email);
    }
}