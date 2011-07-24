<div id="quicklinkscontainer">
	<div id="quicklinksleft">
		<ul>
<?php	
$quicklinkquerystring = 'SELECT l.link_name, l.link_url, l.link_image, l.link_notes, l.link_target FROM wp_term_relationships w inner join wp_links l on w.object_id = l.link_id inner join wp_term_taxonomy t on w.term_taxonomy_id = t.term_taxonomy_id inner join wp_terms u on t.term_id = u.term_id and u.slug = "quicklinks" and l.link_visible = "Y" and l.link_rating <= 5 ORDER BY l.link_rating DESC LIMIT 0,1000'; 
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
	<div id="quicklinksright">
		<ul>
<?php	
$quicklinkquerystring = 'SELECT l.link_name, l.link_url, l.link_image, l.link_notes, l.link_target FROM wp_term_relationships w inner join wp_links l on w.object_id = l.link_id inner join wp_term_taxonomy t on w.term_taxonomy_id = t.term_taxonomy_id inner join wp_terms u on t.term_id = u.term_id and u.slug = "quicklinks" and l.link_visible = "Y" and l.link_rating >= 5 ORDER BY l.link_rating DESC LIMIT 0,1000'; 
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
