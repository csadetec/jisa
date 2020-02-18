<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SERVER['SERVER_NAME'] != 'jisa.azurewebsites.net'):
	$active_group = 'default';

else:
	$active_group = 'azure';

endif;
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'userdb',
	'password' => 'userdb_server',
	'database' => 'jisa',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['azure'] = array(
	'dsn'	=> '',
	'hostname' => 'bdprotocolo.mysql.database.azure.com',
	'username' => 'csadetec@bdprotocolo',
	'password' => '@Csadetec_server',
	'database' => '1909344_lucas',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

