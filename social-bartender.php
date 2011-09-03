<?php
/*
Plugin Name: Social Bartender
Plugin URI: http://shakenandstirredweb.com
Description: A simple solution for adding a list of social network links (images or text) anywhere you want, with one little function. 
Version: 1.0.0
Author: Sawyer Hollenshead (Shaken &amp; Stirred Web)
Author URI: http://shakenandstirredweb.com
License: GPLv2

Copyright 2011 Sawyer Hollenshead (hello@shakenandstirredweb.com)

This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License as published by 
the Free Software Foundation; either version 2 of the License, or (at 
your option) any later version.This program is distributed in the hope 
that it will be useful, but WITHOUT ANY WARRANTY; without even the 
implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

*/

define( 'SH_SB_DIR', plugin_dir_url(__FILE__) );

add_action('init',  'sh_sb_init');

function sh_sb_init(){

	load_plugin_textdomain( 'shaken', FALSE, SH_SB_DIR.'languages' );
	
	if( current_user_can( 'manage_options' ) ){
		// Display admin pages
		add_action( 'admin_menu', 'sh_sb_create_menu' );
	}
		 	
}

function sh_sb_create_menu(){
	
	$settings = add_options_page( 'Social Bartender', 'Social Bartender', 'manage_options', __FILE__, 'sh_sb_settings_page');
	
	add_options_page( 'Help', 'Help', 'manage_options', 'social-bartender/help.php', 'sh_sb_help_page' );
					  
	//script actions with page detection 
	add_action( 'admin_print_scripts-'.$settings, 'sh_sb_image_admin_scripts' ); 
		
	//style actions with page detection
	add_action( 'admin_print_styles-'.$settings, 'sh_sb_image_admin_styles' );
	
	//add contextual help
	$helplink = admin_url( 'options-general.php?page=social-bartender/help.php' );
	$text = __('<p>View instructions for <a href="' . $helplink .'">Social Bartender</a>.</p>', 'shaken');
	add_contextual_help( $settings, $text ); 
}

//script actions with page detection 
function sh_sb_image_admin_scripts() { 
	wp_enqueue_script( 'sh-image-upload', SH_SB_DIR.'js/scripts.js', 
					   array( 'jquery', 'media-upload', 'thickbox', 'jquery-ui-core', 'jquery-ui-sortable', 'jquery-ui-tabs' ) );
}

//style actions with page detection
function sh_sb_image_admin_styles() { 
	wp_enqueue_style( 'sh-image-upload', SH_SB_DIR.'css/styles.css', array( 'thickbox', 'nav-menu' ) );
}

/**
 * social_bartender
 *
 * Outputs the links with an image or title inside 
 *
 * @param string		$link_before 	Sets the text or html that precedes the <a> tag.
 * @param string		$link_after 	Sets the text or html that follows the <a> tag.
 * @param string		$echo 			Echo the content if true (1) or return if false (0)
 *
 * @return string
*/
function social_bartender( $link_before = '', $link_after = '', $echo = 1 ){

	$items = get_option( 'sh_sb_items' );
	$output = '';
	
	foreach( $items as $item ):
		
		$link = $item['link'];
		$title = $item['title'];
		$icon = $item['icon'];
		
		if( $link ):
			
			$output .= $link_before;
			
			$output .= '<a href="'.$link.'" class="sh-sb-link">';
				
			if( $icon && get_option( 'sh_sb_title_only' ) != 'yes' ){
				$output .= '<img src="'.$icon.'" alt="'.$title.'" class="sh-sb-icon" />';
			}
			
			if( $title && get_option( 'sh_sb_title_only' ) == 'yes' ){
				$output .= $title;
			}
			
			$output .= '</a>';
			
			$output .= $link_after;
			
		endif;
		
	endforeach;
	
	if( $echo == 1 )
		echo $output;
	else
		return $output;
}

require_once(WP_PLUGIN_DIR . "/" . basename(dirname(__FILE__)) . "/settings.php");
require_once(WP_PLUGIN_DIR . "/" . basename(dirname(__FILE__)) . "/help.php");

?>