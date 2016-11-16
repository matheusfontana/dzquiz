<?php
namespace AppBundle\Service;

use \Exception;

use AppBundle\Entity;

class Survey extends ServiceBase
{
	/**
	 * Generates a new survey based on a template
	 *
	 * @param string $templateSurveyId Template survey code
	 * @return Entity\Survey $survey
	 */
	public function generateSurvey($templateSurveyId)
	{
		$manager = $this->getDoctrine()->getManager('default');
		$manager->getConnection()->beginTransaction();

		$survey = new Entity\Survey();

		try{
			
			$templateSurvey = $manager->getRepository('AppBundle:TemplateSurvey')
								->findOneBy(array('id' => $templateSurveyId));

			if (empty($templateSurvey)) {
				throw new Exception("Invalid survey template has been informed", 404);
			}

			$survey->setTemplateSurvey($templateSurvey);

			$manager->persist($survey);
			$manager->flush();

			$manager->getConnection()->commit();
		
			return $survey;
		} catch (Exception $e) {
			$manager->getConnection()->rollback();
			throw $e;
		}

	}

	/**
	 * Gets a specific survey
	 *
	 * @param string $surveyId survey code
	 * @return string $result
	 */
	public function getSurvey($surveyId)
	{
		$manager = $this->getDoctrine()->getManager('default');

		try{
			
			$surveys = $manager->getRepository('AppBundle:Survey')
								->findOneBy(array('id' => $surveyId));

			return $surveys;

		} catch (Exception $e) {
			throw $e;
		}
	}

	/**
	 * Gets a list of surveys
	 *
	 * @param string $surveyId survey code
	 * @return string $result
	 */
	public function getSurveys()
	{
		$manager = $this->getDoctrine()->getManager('default');

		try{
			
			$surveys = $manager->getRepository('AppBundle:Survey')
								->findBy(array(),
										array(),
										10,
										0
									);
			return $surveys;

		} catch (Exception $e) {
			throw $e;
		}
	}

	/**
	 * Gets a survey identity
	 *
	 * @param string $surveyId survey code
	 * @return string $result
	 */
	public function getSurveyIdentity($surveyId)
	{
		$manager = $this->getDoctrine()->getManager('default');

		try{
			
			$survey = $manager->getRepository('AppBundle:Survey')
								->findOneBy(array('id' => $surveyId));

			if (empty($survey)) {
				throw new Exception("Invalid survey code has been informed", 404);
			}

			$srvanswers = $survey->getSurveyAnswers();

			if (count($srvanswers) < 5) {
				throw new Exception("Is not possible to retrieve an identity of an unfinished survey", 400);
			}

			$answers = array();
			foreach($srvanswers as $key => $srvanswer) {
				$answers[] = $srvanswer->getAnswer();
			}

			$countPerIdentity = array();
			$answerData = array();
			foreach(array_reverse($answers) as $key => $answer){
				$identity = $answer->getIdentitySurvey()->getId();

				if (!isset($countPerIdentity[$identity])) {
					$countPerIdentity[$identity] =  1;
				} else {
					$countPerIdentity[$identity] += $countPerIdentity[$identity];
				}

				$answerData[$identity][] = $answer->getQuestion()->getOrder();
			}

			//sorting the highest occurrences as first in the array of counts per identity
			arsort($countPerIdentity);
			$greatestCountId = null;
			$previousCount = 0;
			foreach($countPerIdentity as $identity => $currentCount) {
				if ($previousCount < $currentCount) {
					$greatestCountId = $identity;
					$previousCount = $currentCount;

				} else if ($previousCount == $currentCount) {
					//get most important question order of current index
					$currentIndexBiggestOrder = null;
					foreach($answerData[$identity] as $key => $order) {
						if ($order > $currentIndexBiggestOrder) {
							$currentIndexBiggestOrder = $order;
						}
					}

					//get most important question order of the biggest index
					$previousIndexesBiggestOrder = null;
					foreach($answerData[$greatestCountId] as $key => $order){
						if ($order > $previousIndexesBiggestOrder) {
							$previousIndexesBiggestOrder = $order;
						}
					}

					//sets the identity to the greatest order, solving the draw
					if ($previousIndexesBiggestOrder < $currentIndexBiggestOrder) {
						$greatestCountId = $identity;
						$previousCount = $currentCount;
					}
				}
			}

			$identity = $manager->getRepository('AppBundle:IdentitySurvey')
							->findOneBy(array('id' => $greatestCountId));

			return $identity;

		} catch (Exception $e) {
			throw $e;
		}

	}
}