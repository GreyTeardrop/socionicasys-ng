<?php

/**
 * Консольная команда для обновления файла браузеров Browscap
 */
class BrowscapUpdateCommand extends CConsoleCommand
{
	/**
	 * Собственнно, код команды
	 * @param array $args параметры командной строки
	 */
	public function run($args)
	{
		Yii::import('application.vendors.phpbrowscap.browscap.Browscap');
		$browscap = new Browscap(Yii::app()->getRuntimePath());
		$browscap->updateCache();
	}
}