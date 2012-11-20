<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
		'type' => 'mysqli',
		'connection' => array(
// 			'hostname' => 'localhost',
// 			'port' => '3306',
// 			'database' => 'tcr',
// 			'username' => 'root',
// 			'password' => '',
			'hostname' => 'sql.ghggroup.nazwa.pl',
			'port' => '3307',
			'database' => 'ghggroup_30',
			'username' => 'ghggroup_30',
			'password' => '123ToCoRobimy!@#',
			
		),
		'table_prefix' => '',
		'charset' => 'utf8',
		'enable_cache' => true,
		'profiling' => true,
	),
);
