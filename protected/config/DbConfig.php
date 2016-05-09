<?php

class DbConfig
{
	public static function getDbConfig()
	{
		return array(
//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',

			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=sample',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => 'root',
			'charset' => 'utf8',
			'enableProfiling' => true,
			'enableParamLogging' => true,
			'class' => 'CDbConnection'

		);
	}
}