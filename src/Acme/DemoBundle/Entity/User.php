<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class User
{
    protected $id;
    protected $favoriteColors;

    public function __construct()
    {
        $this->favoriteColors = new ArrayCollection();
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
    public function getFavoriteColors()
    {
        return $this->favoriteColors;
    }

    /**
     * @param mixed $favoriteColors
     */
    public function setFavoriteColors($favoriteColors)
    {
        $this->favoriteColors = $favoriteColors;
    }

    public function addFavoriteColor($favoriteColor)
    {
        $this->favoriteColors->add($favoriteColor);
    }

    public function removeFavoriteColor($favoriteColor)
    {
        $this->favoriteColors->removeElement($favoriteColor);
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('favoriteColors', new Assert\All(array(
            'constraints' => array(
                new Assert\NotBlank(),
                new Assert\Length(array('min' => 5)),
            ),
        )));
    }
}