<?php
// This function returns the number of rows returned in the SQL query, and assigns the results array to the array provided
function sql($sql, &$array)
{
 	$array = "";
  	$q = mysql_query($sql);
  	if (mysql_error())
  	{
  		capturecritical(mysql_error());	
  	} 
  	else 
  	{
	   $ret = mysql_num_rows($q);
   	if ($ret > 0)
   	{
    		$array = $q;
   	}
  	}
  	return $ret;
}
 
function sqlcount($sql)
{
 	if (sql($sql, $result))	
	{
		$row = mysql_fetch_array($result);	 

		return $row[0];
	}	
	else 
	{
		return 0;
	}		 
}

function sqlcreate($sql)
{
	mysql_query($sql);
  	if (mysql_error())
  	{
  		capturecritical(mysql_error());	
  	}
	return 1;
}
?> 