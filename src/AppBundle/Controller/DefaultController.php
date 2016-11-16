<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="site_index")
	 * @Method("GET")
	 */
	public function indexAction(Request $request)
	{

		$survey = $this->get('app.service.survey');
		$surveys = $survey->getSurveys();

		return $this->render('AppBundle::index.html.twig', array(
			'opened' => $surveys,
			'closed' => array(),
		));
	}

	/**
	 * @Route("/newsurvey", name="new_survey")
	 * @Method("GET") 
	 */
	public function newAction(Request $request)
	{

		$surveyService = $this->get('app.service.survey');
		$survey = $surveyService->generateSurvey(1);

		return $this->redirectToRoute('survey_details', array(
			'id' => $survey->getId(),
		));
	}

	/**
	 * @Route("/survey/{id}", name="survey_details")
	 * @Method("GET") 
	 */
	public function getSurveyAction($id)
	{

		$surveyService = $this->get('app.service.survey');
		$survey = $surveyService->getSurvey($id);

		$answerService = $this->get('app.service.answer');
		
		$template = $survey->getTemplateSurvey();
		$questions = $template->getQuestions();

		foreach($questions as $key => $question){
			$questions[$key]->setAnswers($answerService->getAllAnswersOfQuestion($question->getId(), $survey->getId()));
		}

		return $this->render('AppBundle::survey.html.twig', array(
			'surveyId' => $id,
			'template' => $template,
			'questions' => $questions,
		));
	}


	/**
	 * @Route("/survey/save", name="save_data")
	 * @Method("POST") 
	 */
	public function saveDataAction(Request $request)
	{

		$questions = $request->request->get('question');
		$survey = $request->request->get('surveyId');

		$answerService = $this->get('app.service.answer');

		foreach($questions as $qNum => $answerId){
			$data = array(
				'question' => $qNum,
				'survey' => $survey,
				'answer' => $answerId,
			);

			$answerService->answerQuestion($data);
		}

		$surveyService = $this->get('app.service.survey');
		$identity = $surveyService->getSurveyIdentity($survey);

		return $this->render('AppBundle::surveyIdentity.html.twig', array(
			'identity' => $identity,
		));
	}
}
