<?php

use Phinx\Migration\AbstractMigration;

class IdentitySurveyTable extends AbstractMigration
{
	/**
	 * Change Method.
	 *
	 * Write your reversible migrations using this method.
	 *
	 * More information on writing migrations is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
	 *
	 * The following commands can be used in this method and Phinx will
	 * automatically reverse them when rolling back:
	 *
	 *    createTable
	 *    renameTable
	 *    addColumn
	 *    renameColumn
	 *    addIndex
	 *    addForeignKey
	 *
	 * Remember to call "create()" or "update()" and NOT "save()" when working
	 * with the Table class.
	public function change()
	{

	}
	*/

	/**
	 * Migrate up
	 * @return void
	 */
	public function up()
	{
		$idSurvey = $this->table('identity_survey', array('engine' => 'InnoDB'));
		$idSurvey->addColumn('name', 'string', array('limit' => 200))
			->addColumn('description', 'string', array('limit' => 200))
			->addColumn('template_survey_id', 'integer', array('limit' => 11))
			->addForeignKey('template_survey_id', 'template_survey', 'id', array('delete' => 'RESTRICT', 'update' => 'RESTRICT'))
			->save();
	}

	/**
	 * Migrate down
	 * @return void
	 */
	public function down()
	{
		$this->dropTable('identity_survey');
	}
}
