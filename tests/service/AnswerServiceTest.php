<?php
namespace tests\service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\Service;

class AnswerServiceTest extends KernelTestCase
{
	private $service;

	protected function setUp()
	{
		self::bootKernel();
		$this->service = static::$kernel->getContainer()
			->get('app.service.answer');
	}

	public function testGetAllAnswersOfQuestion()
	{
		$survey = 1;
		$i = 1;
		for($i;$i<=5;$i++){
			$object = $this->service->getAllAnswersOfQuestion($i, $survey);

			$this->assertCount(5, $object);
		}
		
	}

	public function testAnswerQuestion()
	{
		$data = array(
			array(
				'question' => '1',
				'survey' => '1',
				'answer' => '4',
			),
			array(
				'question' => '2',
				'survey' => '1',
				'answer' => '7',
			),
			array(
				'question' => '3',
				'survey' => '1',
				'answer' => '11',
			),array(
				'question' => '4',
				'survey' => '1',
				'answer' => '18',
			),
			array(
				'question' => '5',
				'survey' => '1',
				'answer' => '23',
			),
			array(
				'question' => '1',
				'survey' => '2',
				'answer' => '2',
			),
			array(
				'question' => '2',
				'survey' => '2',
				'answer' => '6',
			),
			array(
				'question' => '3',
				'survey' => '2',
				'answer' => '14',
			),array(
				'question' => '4',
				'survey' => '2',
				'answer' => '19',
			),
			array(
				'question' => '5',
				'survey' => '2',
				'answer' => '21',
			),
		);

		/* foreach($data as $key => $answer) {
			$object = $this->service->answerQuestion($answer);
		
			$this->assertInstanceOf('AppBundle\Entity\SurveyAnswer', $object);
		} */
	}

	protected function tearDown()
	{
		parent::tearDown();
	}
}
