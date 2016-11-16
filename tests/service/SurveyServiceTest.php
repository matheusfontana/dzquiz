<?php
namespace tests\service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SurveyServiceTest extends KernelTestCase
{
	private $service;

	protected function setUp()
	{
		self::bootKernel();
		$this->service = static::$kernel->getContainer()
			->get('app.service.survey');
	}

	public function testGenerateSurvey()
	{
		$templateSurveyId = '1';

		//$object = $this->service->generateSurvey($templateSurveyId);
		
		//$this->assertInstanceOf('AppBundle\Entity\Survey', $object);
	}

	public function testGetSurveyIdentity()
	{
		$survey = '2';

		$object = $this->service->getSurveyIdentity($survey);
		
		$this->assertInstanceOf('AppBundle\Entity\IdentitySurvey', $object);
	}

	protected function tearDown()
	{
		parent::tearDown();

	}
}