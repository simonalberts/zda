<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Zevende-dags adventisten gemeente Hilversum</title>	
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		<meta name="description" content="Zevende-dags adventisten gemeente Hilversum">
		<meta name="keywords" content="zevendedags adventisten, adventisten, zevende dag, zevendedag, gemeente, kerk, hilversum, bijbelstudie, bijbeltekst, bijbel, gezondheid, white, ellen, ellen white, ellen gauld white, egw, kerkgenootschap, sabbat, sjabbat, openbaringen, openbaring, dialoog, god, vorming, toerusting, sabbatschool, rustdag, rust, recept, recepten, gezond leven, leven, waarheid, jezus, messias, christus, levend water, ik ben, jhwh">
		<meta name="robots" content="all">
		<meta name="revisit-after" content="7 days">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icons/zda.ico">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
      <?php wp_head(); ?>
	</head>
<body>
<div id="headerbarcontainer">
	<div id="headerbar">

		<ul>
<?php	
$quicklinkquerystring = 'SELECT l.link_name, l.link_url, l.link_image, l.link_notes, l.link_target FROM wp_term_relationships w inner join wp_links l on w.object_id = l.link_id inner join wp_term_taxonomy t on w.term_taxonomy_id = t.term_taxonomy_id inner join wp_terms u on t.term_id = u.term_id and u.slug = "quicklinks" and l.link_visible = "Y" LIMIT 0,1000'; 
$quicklinks = $wpdb->get_results($quicklinkquerystring);

if ($quicklinks)
{ 
 	foreach ($quicklinks as $link)
 	{
		echo "			<li>\n";
		echo '					<a href="'. $link->link_url.'" target="'.$link->link_target.'">';
		if ($link->link_image <> '' || strstr($link->link_notes, "/images") )
		{		
			echo '<img src="';
			if ($link->link_image <> '')
			{
				echo $link->link_image;
			}
			else 
			{	
		   	bloginfo('stylesheet_directory');
				echo $link->link_notes; 		
			}
			echo '" alt="'. $link->link_name .'" title="'. $link->link_name .'">'."";
		}
		else 
		{
			echo $link->link_name;			
		}
		echo "</a>\n";
		echo "			</li>\n";
 	} 	
 } 
	
?>
		</ul>
	</div>
</div>
<div id="mainbannercontainer">
	<div id="mainbanner">
		<div id="mainbannerlogo">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logos/zdalogo.gif" alt="Zevendedags Adventisten" >
		</div>
	</div>
</div>