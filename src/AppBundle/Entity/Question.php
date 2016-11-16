<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="template_survey_id", columns={"template_survey_id"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=200, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="order", type="string", length=2, nullable=false)
     */
    private $order;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TemplateSurvey", inversedBy="questions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="template_survey_id", referencedColumnName="id")
     * })
     */
    private $templateSurvey;

    /**
     * @var \AppBundle\Entity\Answer
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Answer", mappedBy="question")
     */
    protected $answers;

    /**
     *  Class constructor
     */
    public function __construct(){
        $this->answers = new ArrayCollection();
    }


    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set order
     *
     * @param string $order
     *
     * @return Question
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
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
     * @return Question
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
     * Set Answers
     * 
     * @return \AppBundle\Entity\Question
     */
    public function setAnswers(array $answers = null)
    {
        $this->answers = $answers;

         return $this;
    }


    /**
     * Get Answers
     * 
     * @return \AppBundle\Entity\Answer
     */
    public function getAnswers()
    {
        return $this->answers;
    }

}
