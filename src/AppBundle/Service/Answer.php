<?php 
namespace AppBundle\Service;

use \Exception;

use AppBundle\Entity;

class Answer extends ServiceBase
{

	/**
	 * Answers a question with a valid answer
	 * 
	 * @param  array $data Array containing data needed to update the answer
	 * @return 
	 */
	public function answerQuestion(array $data)
	{
		$manager = $this->getDoctrine()->getManager('default');
		$manager->getConnection()->beginTransaction();

		try {
			if (empty($data)) {
				throw new Exception("No data has been sent", 400);
			}

			if (!isset($data['question']) || !isset($data['answer']) || !isset($data['survey'])) {
				throw new Exception("Can't answer the question due to lack of information", 400);
			}

			$surveyAnswer = new Entity\SurveyAnswer();

			$question = $data['question'];
			$answer = $data['answer'];
			$survey = $data['survey'];

			$questionData = $manager->getRepository('AppBundle:Question')
								->findOneBy(array('id' => $question));

			if (empty($questionData)) {
				throw new Exception("Invalid question has been informed", 404);
			}

			$answerData = $manager->getRepository('AppBundle:Answer')
								->findOneBy(array('question' => $question, 'id' => $answer));

			if (empty($answerData)) {
				throw new Exception("Invalid answer has been informed", 404);
			}

			$surveyData = $manager->getRepository('AppBundle:Survey')
								->findOneBy(array('id' => $survey));

			if (empty($surveyData)) {
				throw new Exception("Invalid survey has been informed", 404);
			}

			$surveyAnswer->setSurvey($surveyData);
			$surveyAnswer->setAnswer($answerData);

			$manager->persist($surveyAnswer);
			$manager->flush();

			$manager->getConnection()->commit();

			return $surveyAnswer;
		} catch (Exception $e) {
			$manager->getConnection()->rollback();
			throw $e;
		}
	}

	/**
	 * Get all possible answers of a question
	 * 
	 * @param  string $question Question id
	 * @param  string $survey   Survey id
	 * @return Entity\Answer $answers
	 */
	public function getAllAnswersOfQuestion($question, $survey)
	{
		$manager = $this->getDoctrine()->getManager('default');

		try {

			$questionData = $manager->getRepository('AppBundle:Question')
					->findOneBy(array('id' => $question));

			if (empty($questionData)) {
				throw new Exception("Invalid question has been informed", 404);
			}

			$surveyData = $manager->getRepository('AppBundle:Survey')
					->findOneBy(array('id' => $survey));

			if (empty($surveyData)) {
				throw new Exception("Invalid survey has been informed", 404);
			}

			//making an array of objects "shuffleable" 
			$answers = iterator_to_array($questionData->getAnswers());
			shuffle($answers);

			return $answers;

		} catch (Exception $e) {
			throw $e;
		}
	}

}