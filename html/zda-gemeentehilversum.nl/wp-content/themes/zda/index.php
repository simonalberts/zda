<?php
/**
 * The zda template file.
 *
 * @package ZDA
 * @subpackage gemeente Hilversum
 */

get_header();?>
<?php get_sidebar(); ?>
<div id="contentleft">

<?php 

while ( have_posts() )
{
	the_post();
	the_content();
}
	
?>

</div>
<?php get_footer();
?>