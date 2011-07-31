<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Sabbat-Bible
Plugin URI: 
Description: 
Author: Simon Alberts
Version: 0.1
Author URI: 
*/

add_action('admin_menu', 'sabbat_bible_main');

function sabbat_bible_main() {
	add_options_page('sabbat_bible_options', 'Sabbattijden & bijbelvers', 'manage_options', 'sabbat_bible_options', 'sabbat_bible_options');
}

function sabbat_bible_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

?>