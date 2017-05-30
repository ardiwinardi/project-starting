<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

$dbconf = [
	'host' 	=> 'localhost',
	'user' 	=> '',
	'pass' 	=> '',
	'db' 	=> ''
];

define('WEB_ROOT',str_replace($_SERVER["DOCUMENT_ROOT"],'http://'.$_SERVER['HTTP_HOST'],PATH));

?>
