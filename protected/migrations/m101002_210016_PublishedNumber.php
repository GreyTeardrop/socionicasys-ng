<?php

class m101002_210016_PublishedNumber extends CDbMigration
{
	public function up()
	{
		$this->addColumn('{{library}}', 'published_number', 'string');
	}
	
	public function down()
	{
		$this->dropColumn('{{library}}', 'published_number');
	}
}
