<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeSurvey
 *
 * @ORM\Table(name="type_survey")
 * @ORM\Entity
 */
class TypeSurvey
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_name", type="string", length=200, nullable=false)
     */
    private $typeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set typeName
     *
     * @param string $typeName
     *
     * @return TypeSurvey
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * Get typeName
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
