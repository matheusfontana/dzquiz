<?php

use Phinx\Seed\AbstractSeed;

class IdentitySurveySeed extends AbstractSeed
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
					'name' => 'House of Cards',
					'description' => 'ataca o problema com método e faz de tudo para resolver a situação',
				),
			array(
					'template_survey_id' => '1',
					'name' => 'Game of Thrones',
					'description' => 'não tem muita delicadeza nas ações, mas resolve o problema de forma prática.',
				),
			array(
					'template_survey_id' => '1',
					'name' => 'Lost',
					'description' => 'faz as coisas sem ter total certeza se é o caminho certo ou se faz sentido, mas no final dá tudo certo.',
				),
			array(
					'template_survey_id' => '1',
					'name' => 'Breaking Bad',
					'description' => 'pra fazer acontecer você toma a liderança, mas sempre contando com seus parceiros.',
				),
			array(
					'template_survey_id' => '1',
					'name' => 'Silicon Valley',
					'description' => 'vive a tecnologia o tempo todo e faz disso um mantra para cada situação no dia.',
				),
		);

		$identity_survey = $this->table('identity_survey');
		$identity_survey->insert($data)
			->save();
	}
}
