<?php
// ****************************************************************************
// ** Configuration
// ****************************************************************************
echo "cfg <br>";

// system folders
define('ROOT',dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);
define('LIB',ROOT.'lib'.DIRECTORY_SEPARATOR);
define('CONFIG',ROOT.'config'.DIRECTORY_SEPARATOR);
define('LOGS',ROOT.'logs'.DIRECTORY_SEPARATOR);

//load in the main configuration file
include_once(CONFIG.'base.inc.php');

// ****************************************************************************
// ** System functions
// ****************************************************************************
echo "sys <br>";

include_once(LIB.'system.inc.php');
include_once(LIB.'mysql.inc.php');

// ****************************************************************************
// ** Session, cookies
// ****************************************************************************

// ****************************************************************************
// ** Caching
// ****************************************************************************

// ****************************************************************************
// ** Database
// ****************************************************************************
echo "db <br>";

mysql_connect(DBSERVER,DBUSER,DBPASSWORD) or capturecritical ('Cannot reach the database server.'); 
	
if (!mysql_select_db(DBNAME))
{
	sqlcreate("CREATE DATABASE ". DBNAME);
} 

if (!sqlcount("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'zda' AND table_name = 'users'"))
{
	sqlcreate("Create Table users(id INT UNSIGNED NOT NULL AUTO_INCREMENT, email varchar (256) NOT NULL, username varchar(40) NOT NULL, password CHAR (40) NOT NULL, firstname varchar (15) NOT NULL, lastname varchar (30) NOT NULL, admin boolean NOT NULL Default 0, logins int NOT NULL Default 0, lockedout boolean NOT NULL Default 0, registrationdate datetime NOT NULL, PRIMARY KEY(id), UNIQUE KEY (email), UNIQUE KEY (username), KEY (username, password))");
}

if (!sqlcount("SELECT COUNT(*) FROM zda.users WHERE username='". DEFAULTADMINUSER. "'"))
{
	sqlcreate("INSERT INTO zda.users (username, email, password, firstname, lastname, admin, logins, lockedout, registrationdate) VALUES ('". DEFAULTADMINUSER ."', '". DEFAULTADMINEMAIL ."', '". DEFAULTADMINPASSWORD ."', '', '', 1, 0, 0, CURDATE())");
}

// ****************************************************************************
// ** Directory and file paths
// ****************************************************************************

// ****************************************************************************
// ** Global variables and constants
// ****************************************************************************

// ****************************************************************************
// ** Web application status
// ****************************************************************************

// ****************************************************************************
// ** Web page routing
// ****************************************************************************

// ****************************************************************************
// ** Feeds
// ****************************************************************************

// ****************************************************************************
// ** XML/RPC
// ****************************************************************************
?>