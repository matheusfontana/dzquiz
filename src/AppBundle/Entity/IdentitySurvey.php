<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IdentitySurvey
 *
 * @ORM\Table(name="identity_survey", indexes={@ORM\Index(name="template_survey_id", columns={"template_survey_id"})})
 * @ORM\Entity
 */
class IdentitySurvey
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

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
     * Set name
     *
     * @param string $name
     *
     * @return IdentitySurvey
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
     * Set description
     *
     * @param string $description
     *
     * @return IdentitySurvey
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * @return IdentitySurvey
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
}
