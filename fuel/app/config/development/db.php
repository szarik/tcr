<?php
/**
 * The development database settings.
 */

return array(
	default' => array(
		'type'        => 'pdo',
		'connection'  => array(
			'dsn'	   => 'pgsql:host=localhost;port=5432;dbname=tcr',
			'username' => 'tcr',
			'password' => 'tcr',
			'persistent'=> true
			//'dsn'   => 'postgresql:pgsql.nazwa.pl:5432:allow',
		    //'username' => 'ghggroup_28',
		    //'password' => '123ToCoRobimy!@#',
		),
	),
);
