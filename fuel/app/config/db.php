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
			'dsn'		=> 'postgresql:localhost:5432',
			'username'	=> 'tcr',
			'password'	=> '',
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

	'redis' => array(
		'default' => array(
			'hostname'  => '127.0.0.1',
			'port'      => 6379,
			'timeout'	=> null,
		)
	),

);
