<?php
// ****************************************************************************
// ** Configuration
// ****************************************************************************

// system folders
define('ROOT',dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR); // base folder
define('LIB',ROOT.'lib'.DIRECTORY_SEPARATOR); // library folder
define('CONFIG',ROOT.'config'.DIRECTORY_SEPARATOR); // config folder
define('LOGS',ROOT.'logs'.DIRECTORY_SEPARATOR); // logging folder

include_once(CONFIG.'base.inc.php'); //load in the main configuration file

// ****************************************************************************
// ** System functions
// ****************************************************************************

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

mysql_connect(DBSERVER,DBUSER,DBPASSWORD) or capturecritical ('Cannot reach the database server.'); 
	
if (!mysql_select_db(DBNAME))
{
	sqlcreate("CREATE DATABASE ". DBNAME);
} 
$usercount = sqlcount("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'zda' AND table_name = 'users'");
if ($usercount <= 0)
{
	sqlcreate("Create Table users(id INT UNSIGNED NOT NULL AUTO_INCREMENT, email varchar (256) NOT NULL, username varchar(40) NOT NULL, password CHAR (40) NOT NULL, firstname varchar (15) NOT NULL, lastname varchar (30) NOT NULL, admin boolean NOT NULL Default 0, logins int NOT NULL Default 0, lockedout boolean NOT NULL Default 0, registrationdate datetime NOT NULL, PRIMARY KEY(id), UNIQUE KEY (email), UNIQUE KEY (username), KEY (username, password))");
}
if (!sqlcount("SELECT COUNT(*) FROM zda.users WHERE username='". DEFAULTADMINUSER. "'"))
{
	sqlcreate("INSERT INTO zda.users (username, email, password, firstname, lastname, admin, logins, lockedout, registrationdate) VALUES ('". DEFAULTADMINUSER ."', '". DEFAULTADMINEMAIL ."', '". DEFAULTADMINPASSWORD ."', '', '', 1, 0, 0, CURDATE())");
	$usercount=$usercount+1;
}

// ****************************************************************************
// ** Directory and file paths
// ****************************************************************************

// ****************************************************************************
// ** Global variables and constants
// ****************************************************************************

$usercount = $usercount; // number of users in database
$section = "home"; // current section
$action = ""; // current action
$id = -1; // current data identification

if (isset($_GET["section"]))
{
	$section = htmlspecialchars($_GET["section"]);
}
if (isset($_GET["action"]))
{
	$action = htmlspecialchars($_GET["action"]);
}
if (isset($_GET["id"]))
{
	$id = htmlspecialchars($_GET["id"]);
} 

if (ini_get('register_globals')) 
{
	$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
	foreach ($array as $value) 
	{
		foreach ($GLOBALS[$value] as $key => $var) 
		{
			if ($var === $GLOBALS[$key]) 
			{
				unset($GLOBALS[$key]);
			}
		}
	}
}

// echo "vars ". $section ."/". $action ."/". $id ." <br>";


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