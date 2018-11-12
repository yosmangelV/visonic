<?php
/*
Plugin Name: Better Anchor Links
Plugin URI: http://ludek.org/bal/index.html
Description: Automatically creates and displays anchor links.
Author: Luděk Melichar
Version: 1.7.5
Author URI: http://ludek.org
*/

/*
Copyright 2011-2013 Ludek Melichar, All Rights Reserved (email : ludek.m@gmail.com).

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
if (!class_exists('mwm_aalLoader')) {
	class mwm_aalLoader{
		
		var $version     = '1.7.5';
		var $options     = '';
		var $links = array();
	
		function mwm_aalLoader(){
			$this->upgra_options();
			$this->load_options();					
			$this->define_constants();
			$this->load_dependencies();
			register_activation_hook( plugin_basename( dirname(__FILE__)).'/auto-anchor-list.php', array(&$this, 'activate') );
			wp_register_sidebar_widget('idbal16','Better Anchor Links', array(&$this, 'widget'));
		}
		
		function upgra_options(){
			$options = get_option('lm_bal_options');
			if (!empty( $options ) ){
				if (!array_key_exists('is_numbering', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['is_numbering'] = true;
					update_option('lm_bal_options', $lm_bal_options); 
				}
				if (!array_key_exists('is_indent', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['is_indent'] = false;
					update_option('lm_bal_options', $lm_bal_options); 
				} 
				if (!array_key_exists('is_headHi', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['is_headHi'] = 1;
					$lm_bal_options['is_headLo'] = 6;
					update_option('lm_bal_options', $lm_bal_options); 
				}
				if (!array_key_exists('loc-nicer', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['loc-nicer'] = "en_US";
					update_option('lm_bal_options', $lm_bal_options); 
				}			
				if (!array_key_exists('is_backlink', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['is_backlink'] = false;
					update_option('lm_bal_options', $lm_bal_options); 
				}
				if (!array_key_exists('backlink_text', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['backlink_text'] = "back to content";
					update_option('lm_bal_options', $lm_bal_options); 
				}
				if (!array_key_exists('backlink_char', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['backlink_char'] = "*";
					update_option('lm_bal_options', $lm_bal_options); 
				}
				if (!array_key_exists('is_backlinkfront', $options))
				{
					$lm_bal_options=$options ;
					$lm_bal_options['is_backlinkfront'] = false;
					update_option('lm_bal_options', $lm_bal_options); 
				}
			}
		}
		
		function load_options(){
			// Load the options
			$this->options = get_option('lm_bal_options');
			/*print_r ($this->options); */
		}
		
		function define_constants() {
			// define URL
			define('MWMAALFOLDER', plugin_basename( dirname(__FILE__)) );
			define('MWMAAL_URLPATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
		}
		
		function load_dependencies(){
			// Load backend libraries
			if ( is_admin() ) {	
				require_once (dirname (__FILE__) . '/admin/admin.php');
				$this->mwm_aalAdminPanel = new mwm_aalAdminPanel();
				
			// Load frontend libraries							
			} else {
				if($this->options['activatePlugin']){
					require_once (dirname (__FILE__) . '/mwm-aal-class.php');
					global $mwm_aal;
				}
			}
		}
		
		function activate(){
			$options = get_option('lm_bal_options');
			if ( empty( $options ) ){
			$lm_bal_options['activatePlugin'] = true;
			$lm_bal_options['activateCSS'] = true;
			$lm_bal_options['autoDisplayInContent'] = true;
			$lm_bal_options['displayTitle'] = "Contents";
			$lm_bal_options['contentColumnCount'] = 2;
			$lm_bal_options['is_home'] = false;
			$lm_bal_options['is_single'] = true;
			$lm_bal_options['is_page'] = true;
			$lm_bal_options['is_category'] = true;
			$lm_bal_options['is_tag'] = true;
			$lm_bal_options['is_date'] = true;
			$lm_bal_options['is_author'] = true;
			$lm_bal_options['is_search'] = true;
			$lm_bal_options['is_numbering'] = true;
			$lm_bal_options['is_indent'] = false;
			$lm_bal_options['is_headHi'] = 1;
			$lm_bal_options['is_headLo'] = 6;
            $lm_bal_options['is_backlink'] = false;
			$lm_bal_options['backlink_char'] = "*";
			$lm_bal_options['is_backlinkfront'] = false;
			
			update_option('lm_bal_options', $lm_bal_options);
			}
		}
		
		/**
		* Show a error messages
		*/
		function show_error($message) {
			echo '<div class="wrap"><h2></h2><div class="error" id="error"><p>' . $message . '</p></div></div>' . "\n";
		}
		
		/**
		* Show a system messages
		*/
		function show_message($message) {
			echo '<div class="wrap"><h2></h2><div class="updated fade" id="message"><p>' . $message . '</p></div></div>' . "\n";
		}
		
		/**
		 * widget
		 *
		 * The sidebar widget 
		 */
		function widget($args){
			extract($args);
			//Manditory before widget junk
			echo $before_widget;
			/*echo '<li>'; */
			global $mwm_aal; $mwm_aal->output_sidebar_links();
			/*echo '</li>'; */
			//Manditory after widget junk
			echo $after_widget;
		}
		
		
	
	}
	//Start Loader
	global $mwm_aalLoader;
	$mwm_aalLoader = new mwm_aalLoader();
}
