<?php

use Phinx\Seed\AbstractSeed;

class QuestionSeed extends AbstractSeed
{
	/**
	 * Run Method.
	 *
	 * Write your database seeder using this method.
	 *
	 * More information on writing seeders is available here:
	 * http://docs.phinx.org/en/latest/seeding.html
	 */
	public function run()
	{
		$data = array(
			array(
					'template_survey_id' => '1',
					'text' => 'De manhã, você:',
					'order' => '1',
				),
			array(
					'template_survey_id' => '1',
					'text' => 'Indo para o trabalho você encontra uma senhora idosa caída na rua.',
					'order' => '2',
				),
			array(
					'template_survey_id' => '1',
					'text' => 'Chega no prédio e o elevador está cheio.',
					'order' => '3',
				),
			array(
					'template_survey_id' => '1',
					'text' => 'Você chega no trabalho e as convenções sociais te obrigam a puxar assunto.',
					'order' => '4',
				),
			array(
					'template_survey_id' => '1',
					'text' => 'A pauta pegou o dia todo, mas você está indo para casa.',
					'order' => '5',
				),
		);

		$question = $this->table('question');
		$question->insert($data)
			->save();
	}
}
