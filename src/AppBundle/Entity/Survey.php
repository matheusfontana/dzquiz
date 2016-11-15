<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Survey
 *
 * @ORM\Table(name="survey", indexes={@ORM\Index(name="template_survey_id", columns={"template_survey_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SurveyRepository")
 */
class Survey
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\TemplateSurvey
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TemplateSurvey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="template_survey_id", referencedColumnName="id")
     * })
     */
    private $templateSurvey;

    /**
     * @var \AppBundle\Entity\SurveyAnswer
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SurveyAnswer", mappedBy="survey")
     */
    protected $surveyAnswers;

    /**
     *  Class constructor
     */
    public function __construct(){
        $this->surveyAnswers = new ArrayCollection();
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
     * Set templateSurvey
     *
     * @param \AppBundle\Entity\TemplateSurvey $templateSurvey
     *
     * @return Survey
     */
    public function setTemplateSurvey(\AppBundle\Entity\TemplateSurvey $templateSurvey = null)
    {
        $this->templateSurvey = $templateSurvey;

        return $this;
    }

    /**
     * Get templateSurvey
     *
     * @return \AppBundle\Entity\TemplateSurvey
     */
    public function getTemplateSurvey()
    {
        return $this->templateSurvey;
    }


    /**
     * Get surveyAnswers
     * 
     * @return \AppBundle\Entity\SurveyAnswer
     */
    public function getSurveyAnswers()
    {
        return $this->surveyAnswers;
    }
}
