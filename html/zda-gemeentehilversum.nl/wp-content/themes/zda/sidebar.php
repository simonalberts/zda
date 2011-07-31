<?php
$months = array("januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december");
$friday = mktime(0,0,0, date('m'), date('d') + 5 - date("w"), date('y'));
$sabbat = mktime(0,0,0, date('m'), date('d') + 6 - date("w"), date('y'));

$sabbatquerystring = "SELECT * FROM sabbat WHERE datum = \"" .date('Y-m-d', $sabbat) ."\""; 
$sabbatresult = $wpdb->get_results($sabbatquerystring);

if ($sabbatresult)
{	
	$sabbatentry = $sabbatresult[0];
	$vrijdagzonsondergang = explode(":", $sabbatentry->vrijdagzonsondergang); 
	$sabbatzonsondergang = explode(":", $sabbatentry->sabbatzonsondergang); 
	$fridayoutput = "" .date('d', $friday) ." " .$months[date('m', $friday)-1] ." " .$vrijdagzonsondergang[0] .":" .$vrijdagzonsondergang[1];
	$sabbatoutput = "" .date('d', $sabbat) ." " .$months[date('m', $sabbat)-1] ." " .$sabbatzonsondergang[0] .":" .$sabbatzonsondergang[1];
}
else
{
	$fridayoutput = "" .date('d', $friday) ." " .$months[date('m', $friday)-1];
	$sabbatoutput = "" .date('d', $sabbat) ." " .$months[date('m', $sabbat)-1];
}

$sabbattekstquerystring = "select `sabbat`.`datum` AS `datum`,`bijbeltekst`.`bijbelversie` AS `bijbelversie`,`bijbeltekst`.`boek` AS `boek`,`bijbeltekst`.`hoofdstuk` AS `hoofdstuk`,`bijbeltekst`.`vers` AS `vers`,`bijbeltekst`.`tekst` AS `tekst` from ((`sabbat` join `sabbat_bijbeltekst` on((`sabbat`.`ID` = `sabbat_bijbeltekst`.`sabbatID`))) join `bijbeltekst` on((`bijbeltekst`.`ID` = `sabbat_bijbeltekst`.`bijbeltekstID`))) WHERE datum = \"" .date('Y-m-d', $sabbat) ."\" ORDER BY vers";
$sabbattekstresult = $wpdb->get_results($sabbattekstquerystring);
if ($sabbattekstresult)
{
	$sabbattekstentry = $sabbattekstresult[0];
	$vanvers = $sabbattekstentry->vers;
	$totvers = $vanvers;
	$versoutput = $sabbattekstentry->boek ." ". $sabbattekstentry->hoofdstuk .":";
	$tekstoutput = $sabbattekstentry->tekst;
	
	$index = 1;
	while ($sabbattekstresult[$index] && $index < 2)
	{
		$sabbattekstentry = $sabbattekstresult[$index];
		$totvers = $sabbattekstentry->vers;
		$tekstoutput = $tekstoutput ." ". $sabbattekstentry->tekst;
		$index = $index + 1;
	}
	if ($totvers > $vanvers)
	{
		$versoutput = $versoutput. $vanvers ."-". $totvers;
	}
	else
	{
		$versoutput = $versoutput. $vanvers;
	}
}
else
{
	$versoutput = "Psalm 146:1-2";
	$tekstoutput = "Halleluja! Loof de HEER, mijn ziel. De HEER wil ik loven, zolang ik leef, mijn God bezingen zolang ik besta.";
}

?>
<h6>test</h6>
<div id="sidebar">
<div id="sidebarpanel">
<img src="
<?php bloginfo('stylesheet_directory');?>
/images/sidebar/kerntekst.gif" alt="" >
<?php
echo "<div class=\"bijbelvers\">". $versoutput .".</div><br><div class=\"bijbeltekst\">";
echo "\"". $tekstoutput ."\"</div>";
?>
</div>

<div id="sidebarseparator"></div>

<div id="sidebarpanel">
<img src="
<?php bloginfo('stylesheet_directory');?>
/images/sidebar/zononder.gif" alt="">
<div id="sabbattijden">
<?php 
echo "<strong>Begin sabbat:</strong><br>vrijdag ". $fridayoutput ."<br><br>";
echo "<strong>Einde sabbat:</strong><br>zaterdag ". $sabbatoutput;
?>
</div>
</div> 
</div>

