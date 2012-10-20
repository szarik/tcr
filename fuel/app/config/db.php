<?php
/**
 * Base Database Config.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'active' => 'default',

	/**
	 * Base config, just need to set the DSN, username and password in env. config.
	 */
	'default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'	   => 'pgsql:host=localhost;dbname=tcr',
			'username' => 'tcr',
			'password' => 'tcr',
			'persistent'=> true
			//'dsn'   => 'postgresql:pgsql.nazwa.pl:5432:allow',
		    //'username' => 'ghggroup_28',
		    //'password' => '123ToCoRobimy!@#',
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'enable_cache' => true,
		'profiling'    => false,
	),
);
