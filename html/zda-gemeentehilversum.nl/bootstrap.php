<?php
// ********************************************************
// ** Configuration
// ********************************************************

define('ROOT',dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);
define('LIB',ROOT.'lib'.DIRECTORY_SEPARATOR);
define('CONFIG',ROOT.'config'.DIRECTORY_SEPARATOR);
define('LOGS',ROOT.'logs'.DIRECTORY_SEPARATOR);

if ($debug)
{
	print('base = '.BASE.'<br>');
	print('lib = '.LIB.'<br>');
	print('config = '.CONFIG.'<br>');
	print('logs = '.LOGS.'<br>');
}

//load in the main configuration file
include_once(CONFIG.'base.php');
 
?>