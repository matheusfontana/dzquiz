<?php

use Phinx\Seed\AbstractSeed;

class TypeSurveySeed extends AbstractSeed
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
			array('type_name' => 'Séries de TV')
		);

		$type_survey = $this->table('type_survey');
		$type_survey->insert($data)
			->save();

	}
}
