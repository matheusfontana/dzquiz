<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer", indexes={@ORM\Index(name="question_id", columns={"question_id"}), @ORM\Index(name="identity_survey_id", columns={"identity_survey_id"})})
 * @ORM\Entity
 */
class Answer
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=200, nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\IdentitySurvey
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\IdentitySurvey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identity_survey_id", referencedColumnName="id")
     * })
     */
    private $identitySurvey;

    /**
     * @var \AppBundle\Entity\Question
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     */
    private $question;



    /**
     * Set text
     *
     * @param string $text
     *
     * @return Answer
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set identitySurvey
     *
     * @param \AppBundle\Entity\IdentitySurvey $identitySurvey
     *
     * @return Answer
     */
    public function setIdentitySurvey(\AppBundle\Entity\IdentitySurvey $identitySurvey = null)
    {
        $this->identitySurvey = $identitySurvey;

        return $this;
    }

    /**
     * Get identitySurvey
     *
     * @return \AppBundle\Entity\IdentitySurvey
     */
    public function getIdentitySurvey()
    {
        return $this->identitySurvey;
    }

    /**
     * Set question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return Answer
     */
    public function setQuestion(\AppBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
