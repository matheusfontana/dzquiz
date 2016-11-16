<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TemplateSurvey
 *
 * @ORM\Table(name="template_survey", indexes={@ORM\Index(name="type_survey_id", columns={"type_survey_id"})})
 * @ORM\Entity
 */
class TemplateSurvey
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\TypeSurvey
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeSurvey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_survey_id", referencedColumnName="id")
     * })
     */
    private $typeSurvey;

    /**
     * @var \AppBundle\Entity\Question
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Question", mappedBy="templateSurvey")
     */
    protected $questions;

    /**
     *  Class constructor
     */
    public function __construct(){
        $this->questions = new ArrayCollection();
    }
    
    /**
     * Set name
     *
     * @param string $name
     *
     * @return TemplateSurvey
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeSurvey
     *
     * @param \AppBundle\Entity\TypeSurvey $typeSurvey
     *
     * @return TemplateSurvey
     */
    public function setTypeSurvey(\AppBundle\Entity\TypeSurvey $typeSurvey = null)
    {
        $this->typeSurvey = $typeSurvey;

        return $this;
    }

    /**
     * Get typeSurvey
     *
     * @return \AppBundle\Entity\TypeSurvey
     */
    public function getTypeSurvey()
    {
        return $this->typeSurvey;
    }

    /**
     * Get questions
     * 
     * @return \AppBundle\Entity\Question
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
