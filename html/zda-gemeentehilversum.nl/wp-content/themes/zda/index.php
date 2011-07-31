<?php
/**
 * The zda template file.
 *
 * @package ZDA
 * @subpackage gemeente Hilversum
 */

get_header();?>
<table>
<tr>
<td>
<div id="contentleft">

<?php 

while ( have_posts() )
{
	the_post();
	the_content();
}
	
?>

</div> 
</td>
<td>
<?php get_sidebar(); ?>
</td>
</tr>
</table>
<?php get_footer();
?>