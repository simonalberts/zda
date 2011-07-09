<?php
//define our status constant (production or testing)
define('STATUS','testing');

define('SITE','zda-gemeentehilversum.nl');
define('DEFAULTADMINUSER','admin');
define('DEFAULTADMINPASSWORD','password');
define('DEFAULTADMINEMAIL','admin@'.SITE);

switch (STATUS) {
	case 'production': {
      error_reporting(E_ALL);
      ini_set('display_errors',0);
      ini_set('log_errors', 1);
      ini_set('error_log', LOGS); 
		define('DBSERVER','localhost');
		define('DBUSER','user');
		define('DBPASSWORD','password');
		define('DBNAME','zda'); }
	case 'testing': {
      error_reporting(E_ALL | E_STRICT);
		ini_set('display_errors',1);
      ini_set('log_errors', 1);
      ini_set('error_log', LOGS);  
		define('DBSERVER','localhost');
		define('DBUSER','user');
		define('DBPASSWORD','password');
		define('DBNAME','zda'); }
}
?>