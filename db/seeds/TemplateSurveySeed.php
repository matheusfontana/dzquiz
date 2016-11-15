<?php

use Phinx\Seed\AbstractSeed;

class TemplateSurveySeed extends AbstractSeed
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
					'type_survey_id' => '1',
					'name' => 'Qual série de TV você é?',
				),
		);

		$template_survey = $this->table('template_survey');
		$template_survey->insert($data)
			->save();
	}
}
