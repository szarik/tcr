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
		'type'        => 'mysqli',
		'connection'  => array(
			'hostname'       => 'sql.ghggroup.nazwa.pl',
			'port'           => '3307',
			'database'       => 'ghggroup_30',
			'username'       => 'ghggroup_30',
			'password'       => '123ToCoRobimy!@#',
			'persistent'     => false
		),
		'identifier'   => '`',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'enable_cache' => true,
		'profiling'    => false,
	),
);
?>